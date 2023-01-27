<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    #[Route('/', name: 'app_')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Ce controleur fonctionne!',
            'path' => 'src/Controller/Controller.php',
        ]);

        
    }
}
