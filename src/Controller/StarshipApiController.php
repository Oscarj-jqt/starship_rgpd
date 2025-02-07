<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAll();

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository, LoggerInterface $logger): Response
    {
        $starship = $repository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        // adding a log when data is processed
        $logger->info('User accessed a starship', ['userId' => 1]);

        return $this->json($starship);
    }

    #[Route('/test-log', methods: ['GET'])]
    public function testLog(LoggerInterface $logger): Response
    {
        $logger->info('Test log entry');

        return new Response('Log ajouté');
    }
}
