<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $count = 1;

        $someInfo = [
            "name" => "Umed",
            "surname" => "Mirsaidov",
            "age" => "20",
            "email" => "some-email",
        ];
        return $this->render('main/homepage.html.twig', [
            "count" => $count,
            "someInfo" => $someInfo,
        ]);
    }
}
