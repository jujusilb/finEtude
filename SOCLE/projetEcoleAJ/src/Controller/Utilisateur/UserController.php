<?php

namespace App\Controller\Utilisateur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user', name: 'user_')]
final class UserController extends AbstractController{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('utilisateur/user/index.html.twig', [
            'controller_name' => 'UserController',
            'titre'=> 'User'
        ]);
    }
}
