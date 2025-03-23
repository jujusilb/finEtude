<?php

namespace App\Controller\Forum;

use App\Entity\Forum\SubForum;
use App\Entity\Forum\Thread;
use App\Form\Forum\ThreadType;
use App\Repository\Forum\ThreadRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/thread', name: 'thread_')]
class ThreadController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(threadRepository $threadRepo): Response
    {
        return $this->render('forum/thread/index.html.twig', [
            'controller_name' => 'threadController',
            'titre' => 'Thread',
            'threads' => $threadRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $thread = new Thread();
        $form = $this->createForm(ThreadType::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $thread->setCreateur($user);
            $thread->setCreatedAt(new DateTimeImmutable());
            $entityManager->persist($thread);
            $entityManager->flush();

            return $this->redirectToRoute('thread_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/thread/new.html.twig', [
            'thread' => $thread,
            'titre' => 'Nouveau Thread',
            'threadForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Thread $thread): Response
    {
        return $this->render('forum/thread/show.html.twig', [
            'thread' => $thread,
            'titre' => 'Affichage Thread',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Thread $thread, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThreadType::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('thread_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/thread/edit.html.twig', [
            'thread' => $thread,
            'titre' => 'Edition Thread',
            'threadForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Thread $thread, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $thread->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($thread);
            $entityManager->flush();
        }

        return $this->redirectToRoute('thread_index', [], Response::HTTP_SEE_OTHER);
    }
}
