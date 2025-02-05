<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


//It must have to match with the name of the file
class MainController
{
    #It redirects the user(request) to the route he wants to go
    #[Route('/')]
    public function homepage()
   {
       # Here the response (dev) of the request with a status (200 Ok or 404 error...)
        return new Response('Application <strong>symfony</strong>');
   }
}