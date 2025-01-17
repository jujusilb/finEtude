<?php

namespace App\Controller;

use App\Entity\Emprunt;

use App\Repository\EmpruntRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Emprunt', name: 'Emprunt_')]
class EmpruntController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(EmpruntRepository $empruntRepo): Response
    {
        return $this->render('Emprunt/index.html.twig', [
            'controller_name' => 'EmpruntController',
            'emprunts' => $empruntRepo->findAll(),
        ]);
    }
}
