<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


//It must have to match with the name of the file
class MainController
{
    #[Route('/')]
    public function homepage()
   {
        return new Response('Application <strong>symfony</strong>');
   }
}