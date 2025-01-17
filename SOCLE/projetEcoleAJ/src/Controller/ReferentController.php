<?php

namespace App\Controller;

use App\Entity\Referent;
use App\Repository\ReferentRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Referent', name: 'Referent_')]
class ReferentController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ReferentRepository $referentRepo): Response
    {
	
        return $this->render('Referent/index.html.twig', [
            'controller_name' => 'ReferentController',
		'referents' => $referentRepo->findAll(),
        ]);
    }
}
