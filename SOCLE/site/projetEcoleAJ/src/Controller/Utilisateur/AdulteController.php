<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Adulte;

use App\Repository\Utilisateur\AdulteRepository;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adulte', name: 'adulte_')]
class AdulteController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(AdulteRepository $AdulteRepo): Response
    {
        return $this->render('utilisateur/adulte/index.html.twig', [
            'controller_name' => 'AdulteController',
            'titre' => 'Adulte',
            'adultes' => $AdulteRepo->findAll(),
        ]);
    }
}
