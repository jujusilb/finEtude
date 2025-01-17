<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Default', name: 'Default_')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function home(): Response
    {
        return $this->render('Default/index.html.twig', [
            'controller_name' => 'DefaultController',
            ]);
    }
}
