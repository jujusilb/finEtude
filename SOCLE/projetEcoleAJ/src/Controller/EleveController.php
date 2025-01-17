<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Repository\EleveRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/eleve', name: 'eleve_')]
class EleveController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(EleveRepository $eleveRepo): Response
    {
	
        return $this->render('eleve/index.html.twig', [
            'controller_name' => 'EleveController',
		'eleves' => $eleveRepo->findAll(),
        ]);
    }
}
