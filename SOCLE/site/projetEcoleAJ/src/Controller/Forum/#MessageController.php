<?php

namespace App\Controller\Forum;

use App\Entity\Utilisateur\Membre;
use App\Entity\Communication\Message;
use App\Repository\Communication\MessageRepository;
use App\Form\Communication\MessageType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
#[Route('/message', name: 'message_')]
class MessageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MessageRepository $messageRepo): Response
    {
        return $this->render('forum/message/index.html.twig', [
            'controller_name' => 'MessageController',
            'titre' => 'Message',
            'messages' =>$messageRepo->findAll()
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $message->setExpediteur($user);
            $message->setCreatedAt(new \DateTimeImmutable());
            $message->setUpdatedAt(new \DateTimeImmutable());
            $this->entityManager->persist($message);
            $this->entityManager->flush();

            return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/message/new.html.twig', [
            'message' => $message,
            'titre' => 'Nouveau Message',
            'messageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Message $message): Response
    {
        return $this->render('forum/message/show.html.twig', [
            'message' => $message,
            'titre' => 'Affichage Message',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Message $message): Response
    {
        $form = $this->createForm(messageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $message->setExpediteur($user);
            $message->setUpdatedAt(new \DateTimeImmutable());
            $this->entityManager->flush();

            return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/message/edit.html.twig', [
            'message' => $message,
            'titre' => 'Edition Message',
            'messageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Message $message): Response
    {
        if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($message);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
