<?php

namespace App\Controller;

use App\Entity\Band;
use App\Entity\Comment;
use App\Entity\Concert;
use App\Entity\Member;
use App\Entity\User;
use App\Form\CommentType;
use App\Form\ConcertType;
use App\Repository\CommentRepository;
use App\Repository\ConcertRepository;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('concert/previous.html.twig', [
            'concerts' => $concertRepository->findAllPreviousConcerts(),
        ]);
    }

    #[Route('/band/{id}', name: 'band')]
    public function showBand(Band $band): Response
    {
        return $this->render('band/usershow.html.twig', [
            'band' => $band,
        ]);
    }

    #[Route('/concert/{id}', name: 'concert')]
    public function showConcert(Concert $concert, Request $request, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $comment->setConcert($concert);
            $comment->setUser($this->getUser());
            $commentRepository->save($comment, true);

            return $this->redirectToRoute('app_concert', ['id' => $concert->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('concert/usershow.html.twig', [
            'comment' => $comment,
            'concert' => $concert,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'comment_delete', methods: ['POST'])]
    public function delete(Request $request, Comment $comment, CommentRepository $commentRepository): Response
    {
        $commentRepository->remove($comment, true);

        return $this->redirectToRoute('app_concert_index', [], Response::HTTP_SEE_OTHER);
    }
}
