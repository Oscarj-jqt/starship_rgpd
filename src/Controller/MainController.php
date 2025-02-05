<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// It must have to match with the name of the file
class MainController extends AbstractController
{
    // It redirects the user(request) to the route he wants to go
    #[Route('/')]
    public function homepage(): Response
    {
        // Here the response (dev) of the request with a status (200 Ok or 404 error...)
        // twig redirect a file matching with the method name (homepage here)
        return $this->render('main/homepage.html.twig');
    }
}
