<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    #[Route('/bands', name: 'app_band')]
    public function index(): Response
    {
        
        return $this->render('base.html.twig');
    }
}
