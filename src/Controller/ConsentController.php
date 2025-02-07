<?php

namespace App\Controller;

use App\Entity\Consent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/consents')]
class ConsentController extends AbstractController
{
    // Endpoint to get consents for a user logged
    #[Route('', name: 'consent_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['message' => 'User not authenticated'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $consents = $em->getRepository(Consent::class)->findBy(['user' => $user]);
        $data = [];
        foreach ($consents as $consent) {
            $data[] = [
                'id' => $consent->getId(),
                'consentType' => $consent->getConsentType(),
                'isConsented' => $consent->getIsConsented(),
                'consentedAt' => $consent->getConsentedAt()->format('Y-m-d H:i:s'),
            ];
        }

        return new JsonResponse($data);
    }

    // Endpoint to create or update a consent
    #[Route('', name: 'consent_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['message' => 'User not authenticated'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $data = json_decode($request->getContent(), true);
        $consentType = $data['consentType'] ?? null;
        $isConsented = $data['isConsented'] ?? false;

        if (!$consentType) {
            return new JsonResponse(['message' => 'Consent type is required'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $consent = new Consent();
        $consent->setUser($user);
        $consent->setConsentType($consentType);
        $consent->setIsConsented($isConsented);
        $consent->setConsentedAt(new \DateTimeImmutable());

        $em->persist($consent);
        $em->flush();

        return new JsonResponse(['message' => 'Consent saved successfully'], JsonResponse::HTTP_CREATED);
    }
}
