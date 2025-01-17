<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Repository\MatiereRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Matiere', name: 'Matiere_')]
class MatiereController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MatiereRepository $matiereRepo): Response
    {
	
        return $this->render('Matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
		'matieres' => $matiereRepo->findAll(),
        ]);
    }
}
