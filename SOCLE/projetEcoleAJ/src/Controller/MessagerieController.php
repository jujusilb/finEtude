<?php

namespace App\Controller;
use App\Form\Forum\MessageType;
use App\Form\Forum\MessagerieType;
use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\MembreRepository;
use App\Outils\CouteauSuisse;
use App\Entity\Forum\Message;
use App\Repository\Forum\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


#[Route('/messagerie', name: 'messagerie_')]
final class MessagerieController extends AbstractController{
    
    #[Route('/index', name: 'index')]
    public function index(MessageRepository $messageRepo): Response
    {
        $user=$this->getUser();
        if ($user instanceof Membre){
            return $this->render('messagerie/index.html.twig', [
                'controller_name' => 'MessagerieController',
                'titre' => 'Ma Messagerie',
                'messageEnvoyes' =>$messageRepo->findByExpediteur($user->getId()),
                'messageRecus' => $messageRepo->findByDestinataire($user->getId()),
            ]);
        }else {
            return $this->render('messagerie/index.html.twig', [
                'controller_name' => 'MessagerieController',
                'titre' => 'Ma Messagerie',
                'messageEnvoyes' =>$messageRepo->findByExpediteur($user),
                'messageRecus' => $messageRepo->findByDestinataire($user),
            ]);
        }
}

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (MembreRepository $membreRepo, Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new Message();
        $form = $this->createForm(MessagerieType::class, $message);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {      
            $user=$this->getUser();
            $message->setExpediteur($user);
            //$destinataire =$form->get('destinataire')->getData();
            //$membre =$membreRepo->getMembre(trim($destinataire));
            //if ($membre instanceof Membre) { 
                //$message->setDestinataire($membre);
                $message->setCreatedAt(new \DateTimeImmutable());
                $message->setUpdatedAt(new \DateTimeImmutable());
                $message->setPrivatif(true);
    
                $entityManager->persist($message);
                $entityManager->flush();
    
                return $this->redirectToRoute('messagerie_index', [], Response::HTTP_SEE_OTHER);
           /* } else {
                $this->addFlash('error', 'Destinataire introuvable.'); // Add a flash message
                return $this->redirectToRoute('messagerie_nouveau', [], Response::HTTP_SEE_OTHER);
            }*/  
        }
        return $this->render('messagerie/new.html.twig', [
            'message' => $message,
            'titre' => 'Nouveau Message Privé',
            'messageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Message $message): Response
    {
        return $this->render('forum/message/show.html.twig', [
            'message' => $message,
            'titre' => 'Affichage Message',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(MembreRepository $membreRepo, Request $request, Message $message, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(messageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $message->setExpediteur($user);
           
           
            $message->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->flush();

            return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/message/edit.html.twig', [
            'message' => $message,
            'titre' => 'Edition Message',
            'messageForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Message $message, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/{qui}', name: 'getQui', methods: ['GET'])]
    public function qui(string $qui, MembreRepository $membreRepo): Response
    {
        $data=$membreRepo->getConcatNames($qui);
        return $this->json($data);
    }




}


