<?php

namespace App\Controller\Communication;

use App\Entity\Communication\MessagePrive;
use App\Entity\Utilisateur\Membre;
use App\Repository\Communication\MessagePriveRepository;
use App\Form\Communication\MessagePriveType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/messagePrive', name: 'messagePrive_')]
class MessagePriveController extends AbstractController
{

    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(MessagePriveRepository $messagePriveRepo): Response
    {
       return $this->render('communication/message_prive/index.html.twig', [
            'controller_name' => 'MessagePriveController',
		    'titre' => 'MessagePrive',
            'messagePrives' => $messagePriveRepo->findAll()
        ]);
    }


    #[Route('/messagerie', name: 'messagerie')]
    public function messagerie(MessagePriveRepository $messagePriveRepo): Response
    {
 
        $user=$this->getUser();
        if($user instanceof Membre){
            $messagePriveEnvoyes =$messagePriveRepo->findByExpediteur($user->getId());
            $messagePriveRecus =$messagePriveRepo->findByDestinataire($user->getId());
            //dd($messagePriveEnvoyes, $messagePriveRecus);
            return $this->render('communication/message_prive/messagerie.html.twig', [
                'controller_name' => 'MessagePriveController',
                'titre' => 'Ma Messagerie',
                'messagePriveEnvoyes' =>$messagePriveEnvoyes,
                'messagePriveRecus' => $messagePriveRecus,
            ]);
        }else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);
    }




    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $user=$this->getUser();
        if($user instanceof Membre){
            $messagePrive = new MessagePrive();
            $form = $this->createForm(MessagePriveType::class, $messagePrive);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $messagePrive->setExpediteur($user);
                $this->entityManager->persist($messagePrive);
                $this->entityManager->flush();
    
                return $this->redirectToRoute('messagePrive_messagerie', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->render('communication/message_prive/new.html.twig', [
                'messagePrive' => $messagePrive,
                'titre' => 'Nouvel MessagePrive',
                'messagePriveForm' => $form->createView(),
            ]);
        }else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);
        
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(MessagePrive $messagePrive): Response
    {
        return $this->render('communication/message_prive/show.html.twig', [
            'messagePrive' => $messagePrive,
            'titre' => 'Affichage MessagePrive',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, MessagePrive $messagePrive): Response
    {
        $form = $this->createForm(messagePriveType::class, $messagePrive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messagePrive->setUpdatedAt(new DateTimeImmutable());
            $this->entityManager->flush();

            return $this->redirectToRoute('messagePrive_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('communication/message_prive/edit.html.twig', [
            'messagePrive' => $messagePrive,
            'titre' => 'Edition MessagePrive',
            'messagePriveForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, MessagePrive $messagePrive): Response
    {
        if ($this->isCsrfTokenValid('delete' . $messagePrive->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($messagePrive);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('messagePrive_index', [], Response::HTTP_SEE_OTHER);
    }
}
