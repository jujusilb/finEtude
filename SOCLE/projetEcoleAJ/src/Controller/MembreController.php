<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Repository\MembreRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Membre', name: 'Membre_')]
class MembreController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MembreRepository $membreRepo): Response
    {
	
        return $this->render('Membre/index.html.twig', [
            'controller_name' => 'MembreController',
		'membres' => $membreRepo->findAll(),
        ]);
    }
}
