<?php

namespace App\Controller\Communication;

use App\Entity\Communication\MessageGuest;
use App\Entity\Utilisateur\Secretariat;
use App\Repository\Communication\MessageGuestRepository;
use App\Form\Communication\MessageGuestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/messageGuest', name: 'messageGuest_')]
class MessageGuestController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MessageGuestRepository $messageGuestRepo): Response
    {
	    $user=$this->getUser();
        if ($user instanceof Secretariat){
            return $this->render('communication/message_guest/index.html.twig', [
                'controller_name' => 'MessageGuestController',
                'titre' => 'MessageGuest',
                'messageGuests' => $messageGuestRepo->findAll()
            ]);
        }else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);

    }

   
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $messageGuest = new MessageGuest();
        $form = $this->createForm(MessageGuestType::class, $messageGuest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($messageGuest);
            $this->entityManager->flush();

            return $this->redirectToRoute('messageGuest_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('communication/message_guest/new.html.twig', [
            'messageGuest' => $messageGuest,
            'titre' => 'Nouvel MessageGuest',
            'messageGuestForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(MessageGuest $messageGuest): Response
    {
        $user=$this->getUser();
        if ($user instanceof Secretariat){
            return $this->render('communication/message_guest/show.html.twig', [
                'messageGuest' => $messageGuest,
                'titre' => 'Affichage MessageGuest',
            ]);
        }else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);

    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, MessageGuest $messageGuest): Response
    {
        $user=$this->getUser();
        if ($user instanceof Secretariat){
            $form = $this->createForm(messageGuestType::class, $messageGuest);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->entityManager->flush();

                return $this->redirectToRoute('messageGuest_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('communication/message_guest/edit.html.twig', [
                'messageGuest' => $messageGuest,
                'titre' => 'Edition MessageGuest',
                'messageGuestForm' => $form,
            ]);            
        }

    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, MessageGuest $messageGuest): Response
    {
        if ($this->isCsrfTokenValid('delete' . $messageGuest->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($messageGuest);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('messageGuest_index', [], Response::HTTP_SEE_OTHER);
    }
}
