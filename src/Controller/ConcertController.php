<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Concert;
use App\Form\ConcertType;
use Doctrine\ORM\EntityManagerInterface;


class ConcertController extends AbstractController
{
    #[Route('/concert', name: 'concert')]
    public function show(): Response
    {
        return $this->render('concert/index.html.twig', [
            
            
        ]);
    }

    #[Route('/concert/create', name: 'concert_create')]
    public function createConcert(Request $request, EntityManagerInterface $entityManager): Response
    {
        $show = new Concert();

        $form = $this->createForm(ConcertType::class, $show);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $show = $form->getData();

            $entityManager->persist($show);
            $entityManager->flush();

            return $this->redirectToRoute('concert_success');
        }


        return $this->render('concert/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/concert/success', name: 'concert_success')]
    public function success(): Response
    {
        return $this->render('concert/success.html.twig', [
            
            
        ]);
    }
}
