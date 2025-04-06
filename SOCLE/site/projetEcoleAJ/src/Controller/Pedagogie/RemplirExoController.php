<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\RemplirExo;
use App\Repository\Pedagogie\RemplirExoRepository;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/RemplirExo', name: 'RemplirExo_')]
class RemplirExoController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(RemplirExoRepository $remplirExoRepo): Response
    {
	
        return $this->render('pedagogie/Remplir_exo/index.html.twig', [
            'controller_name' => 'RemplirExoController',
		    'titre' => 'Remplir Exo',
            'remplirExos' => $remplirExoRepo->findAll(),
        ]);
    }
}
