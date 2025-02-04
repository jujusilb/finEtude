<?php

namespace App\Controller;

use App\Entity\RemplirExo;
use App\Repository\RemplirExoRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/RemplirExo', name: 'RemplirExo_')]
class RemplirExoController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(RemplirExoRepository $remplirExoRepo): Response
    {
	
        return $this->render('RemplirExo/index.html.twig', [
            'controller_name' => 'RemplirExoController',
		    'titre' => 'Remplir Exo',
            'remplirExos' => $remplirExoRepo->findAll(),
        ]);
    }
}
