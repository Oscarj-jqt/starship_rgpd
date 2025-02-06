<?php

namespace App\Controller;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{

    #[Route('/api/starships')]
    public function getCollection(LoggerInterface $logger): Response
    {
        dd($logger);
        $starships = [
            new Starship(
                1,
                'Starship 1',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q'
            ),
            new Starship(
                2,
                'Starship 2',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction'
            ),
            new Starship(
                3,
                'Starship 3',
                'Latte',
                'James T.Quick',
                'repaired'
            ),
        ];

        return $this->json($starships);
    }
}
