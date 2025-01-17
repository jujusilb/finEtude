<?php

namespace App\Controller;

use App\Entity\Exercice;
use App\Repository\ExerciceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Exercice', name: 'Exercice_')]
class ExerciceController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ExerciceRepository $exerciceRepo): Response
    {
	
        return $this->render('Exercice/index.html.twig', [
            'controller_name' => 'ExerciceController',
		'exercices' => $exerciceRepo->findAll(),
        ]);
    }
}
