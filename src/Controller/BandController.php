<?php

namespace App\Controller;

use App\Entity\Band;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    #[Route('/bands/{id}', name: 'app_band')]
    public function show(Band $band): Response
    {
        return $this->render('base.html.twig', [
            'band' => $band,
            'members' => $band->getMembers(),
            'concerts' => $band->getConcerts(),
            'tags' => $band->getBandTags(),
            'followers' => $band->getFollowers()
        ]);
    }
}
