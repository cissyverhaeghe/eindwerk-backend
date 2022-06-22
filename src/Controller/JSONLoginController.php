<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JSONLoginController extends AbstractController
{
    /**
     * @Route("/app_json_login", name="app_json_login", methods={"POST"})
     */
    public function login()
    {
        return $this->json([
            'id' => $this->getUser() ? $this->getUser()->getId() : "something went wrong",
            'firstname' => $this->getUser()? $this->getUser()->getFirstName() : "something went wrong",
        ]);
    }

}