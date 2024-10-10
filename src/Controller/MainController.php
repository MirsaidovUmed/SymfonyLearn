<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(StarshipRepository $repo): Response
    {
        $ships = $repo->findAll();
        $count = count($ships);

        $someInfo = $ships[array_rand($ships)];

        return $this->render('main/homepage.html.twig', [
            'count' => $count,
            'someInfo' => $someInfo,
        ]);
    }
}
