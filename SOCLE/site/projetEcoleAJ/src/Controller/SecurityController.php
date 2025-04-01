<?php

namespace App\Controller;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
       
         if ($this->getUser()) {
             return $this->redirectToRoute('root_accueil');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        //dd($error);
        $lastUsername = $authenticationUtils->getLastUsername();
        // dd($lastUsername, $this->getUser());
        return $this->render('security/login.html.twig',
        ['last_username' => $lastUsername,
        'titre' => 'Connexion',
        'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    
}
