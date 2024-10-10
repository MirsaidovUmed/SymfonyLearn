<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods:['GET'])]
    public function getCollection(LoggerInterface $logger, StarshipRepository $repository): Response
    {
        // dd($logger);
        $logger->info('Starship collection retrieved');
        dd($repository);
        $starships = [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q',
            ),
            new Starship(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                'repaired',
            ),
            new Starship(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction',
            ),
        ];

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods:['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        // dd($id);
        $starship = $repository->find($id);

        if (!$starship){
            throw $this->createNotFoundException('Starship not found');
        }
        
        return $this->json($starship);
    }
}
