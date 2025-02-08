<?php

// src/Controller/AuthController.php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        return $this->json([
            'message' => 'This endpoint is not used. Remove this controller to let LexikJWTAuthenticationBundle handle authentication.',
        ], Response::HTTP_NOT_FOUND);
        //        $data = json_decode($request->getContent(), true);
        //
        //        $email = $data['email'] ?? '';
        //        $password = $data['password'] ?? '';
        //
        //        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
        //
        //        if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
        //            return new JsonResponse(['message' => 'Invalid credentials'], JsonResponse::HTTP_UNAUTHORIZED);
        //        }
        //
        //        // Ici, pour un exemple simple, on renvoie une réponse de succès.
        //        // Dans une vraie API, tu pourrais générer et renvoyer un token (JWT, par exemple).
        //        return new JsonResponse(['message' => 'Login successful', 'user' => $user->getEmail()]);
        //    }
    }
}
