<?php

namespace App\Controller;

use App\Entity\Professeur;
use App\Repository\ProfesseurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Professeur', name: 'Professeur_')]
class ProfesseurController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ProfesseurRepository $professeurRepo): Response
    {
	
        return $this->render('Professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
		'professeurs' => $professeurRepo->findAll(),
        ]);
    }
}
