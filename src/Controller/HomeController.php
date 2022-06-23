<?php

namespace App\Controller;

use App\Repository\BreedRepository;
use App\Services\DBManager;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/api/cats", methods={"GET"}, name="api_cats")
     */
    public function getCats(DBManager $DBManager)
    {
        $data = $DBManager->GetData("SELECT animal.id, animal.name, photo, animal.breed_id, sex_id, neutered, adopted, agecategory_id FROM animal
                                INNER JOIN breed b on animal.breed_id = b.id
                                INNER JOIN species s on b.species_id = s.id
                                WHERE species_id = 1");

        return $this->json($data);
    }

    /**
     * @Route("/api/dogs", methods={"GET"}, name="api_dogs")
     */
    public function getDogs(DBManager $DBManager)
    {
        $data = $DBManager->GetData("SELECT animal.id, animal.name, photo, animal.breed_id, sex_id, neutered, adopted, agecategory_id FROM animal
                                INNER JOIN breed b on animal.breed_id = b.id
                                INNER JOIN species s on b.species_id = s.id
                                WHERE species_id = 2");

        return $this->json($data);
    }


    /**
     * @Route("/api/adoptionrequest", methods={"POST"}, name="api_adoptionrequest")
     */
    public function postAdoptionrequest(DBManager $DBManager)
    {

        //get the data from the frontend
        $contents = json_decode(file_get_contents("php://input"));

        //create connection
        $conn = $DBManager->getConnection();

        //prepare SQL statement
        $sqlQuery = "INSERT INTO adoptionrequest 
                     SET date = :date, message = :message, animal_id = :animal_id, user_id = :user_id, status_id = :status_id";
        $stmt = $conn->prepare($sqlQuery);

        //sanitize
        $message = htmlspecialchars(strip_tags($contents->message));
            //htmlentities //html_entities_decode
        //bind params
        $stmt->bindParam(":date", $contents->date);
        $stmt->bindParam(":message", $message);
        $stmt->bindParam(":animal_id", $contents->animal_id);
        $stmt->bindParam(":user_id", $contents->user_id);
        $stmt->bindParam(":status_id", $contents->status_id);


        //execute SQL statement
        $stmt->execute();

        return $this->json($contents);
    }


}