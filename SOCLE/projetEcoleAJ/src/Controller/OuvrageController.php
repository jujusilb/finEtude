<?php

namespace App\Controller;

use App\Entity\Ouvrage;
use App\Repository\OuvrageRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Ouvrage', name: 'Ouvrage_')]
class OuvrageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(OuvrageRepository $ouvrageRepo): Response
    {
	
        return $this->render('Ouvrage/index.html.twig', [
            'controller_name' => 'OuvrageController',
		'ouvrages' => $ouvrageRepo->findAll(),
        ]);
    }
}
