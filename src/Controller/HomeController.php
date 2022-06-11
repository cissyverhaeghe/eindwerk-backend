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
        $data = $DBManager->GetData("SELECT animal.id, animal.name, photo, animal.breed_id, sex_id, neutered, adopted FROM animal
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
        $data = $DBManager->GetData("SELECT animal.id, animal.name, photo, animal.breed_id, sex_id, neutered, adopted FROM animal
                                INNER JOIN breed b on animal.breed_id = b.id
                                INNER JOIN species s on b.species_id = s.id
                                WHERE species_id = 2");

        return $this->json($data);
    }



}