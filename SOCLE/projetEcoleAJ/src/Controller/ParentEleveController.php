<?php

namespace App\Controller;

use App\Entity\ParentEleve;
use App\Repository\ParentEleveRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ParentEleve', name: 'ParentEleve_')]
class ParentEleveController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ParentEleveRepository $parentEleveRepo): Response
    {
	
        return $this->render('ParentEleve/index.html.twig', [
            'controller_name' => 'ParentEleveController',
		'parentEleves' => $parentEleveRepo->findAll(),
        ]);
    }
}
