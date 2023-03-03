<?php

namespace App\Controller;

use App\Entity\Band;
use App\Entity\Member;
use App\Entity\User;
use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class Controller extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ConcertRepository $concertRepository): Response
    {
        return $this->render('index.html.twig', [
            'concerts' => $concertRepository->findAllFutureConcerts(),
        ]);
    }

    #[Route('/previous', name: 'previous')]
    public function previous(ConcertRepository $concertRepository): Response
    {
        return $this->render('index.html.twig', [
            'concerts' => $concertRepository->findAllPreviousConcerts(),
        ]);
    }

    #[Route('/band/{id}', name: 'band')]
    public function show(Band $band): Response
    {
        return $this->render('band/usershow.html.twig', [
            'band' => $band,
        ]);
    }
}
