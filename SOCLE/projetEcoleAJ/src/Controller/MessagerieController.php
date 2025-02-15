<?php

namespace App\Controller;

use App\Entity\Utilisateur\Membre;
use App\Outils\CouteauSuisse;
use App\Entity\Forum\Message;
use App\Repository\Forum\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
}