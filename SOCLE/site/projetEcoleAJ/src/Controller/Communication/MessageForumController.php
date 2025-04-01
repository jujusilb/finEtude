<?php

namespace App\Controller\Communication;

use App\Entity\Communication\MessageForum;
use App\Entity\Utilisateur\Membre;
use App\Repository\Communication\MessageForumRepository;
use App\Form\Communication\MessageForumType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/messageForum', name: 'messageForum_')]
class MessageForumController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(MessageForumRepository $messageForumRepo): Response
    {
	
        

        return $this->render('communication/message_forum/index.html.twig', [
            'controller_name' => 'MessageForumController',
		    'titre' => 'MessageForum',
            'messageForums' => $messageForumRepo->findAll()
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $user= $this->getUser();
        if ($user instanceof Membre){
            $messageForum = new MessageForum();
            $form = $this->createForm(MessageForumType::class, $messageForum);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $messageForum->setExpediteur($user);
                $this->entityManager->persist($messageForum);
                $this->entityManager->flush();

                return $this->redirectToRoute('messageForum_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('communication/message_forum/new.html.twig', [
                'messageForum' => $messageForum,
                'titre' => 'Nouvel MessageForum',
                'messageForumForm' => $form->createView(),
            ]);        
        }

    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(MessageForum $messageForum): Response
    {
        return $this->render('communication/message_forum/show.html.twig', [
            'messageForum' => $messageForum,
            'titre' => 'Affichage MessageForum',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, MessageForum $messageForum): Response
    {
        $user=$this->getUser();
        if($user instanceof Membre){
            $form = $this->createForm(messageForumType::class, $messageForum);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $messageForum->setUpdatedAT(new DateTimeImmutable());
                $this->entityManager->flush();
    
                return $this->redirectToRoute('messageForum_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->render('communication/message_forum/edit.html.twig', [
                'messageForum' => $messageForum,
                'titre' => 'Edition MessageForum',
                'messageForumForm' => $form,
            ]);
        }

    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, MessageForum $messageForum): Response
    {
        if ($this->isCsrfTokenValid('delete' . $messageForum->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($messageForum);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('messageForum_index', [], Response::HTTP_SEE_OTHER);
    }
}
