<?php

namespace App\Controller;

use App\Entity\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAll();

        return $this->json($starships);
    }

    /**
     * @Route("/starship/{id}", name="view_starship")
     */
    public function viewStarship(Starship $starship, AuthorizationCheckerInterface $authChecker): Response
    {
        // Vérifie si l'utilisateur a le droit de voir ce vaisseau
        if (!$authChecker->isGranted('VIEW', $starship)) {
            throw $this->createAccessDeniedException('You do not have permission to access this starship.');
        }

        return $this->render('starship/view.html.twig', [
            'starship' => $starship,
        ]);
    }

    #[Route('/test-log', methods: ['GET'])]
    public function testLog(LoggerInterface $logger): Response
    {
        $logger->info('Test log entry');

        return new Response('Log added');
    }
}
