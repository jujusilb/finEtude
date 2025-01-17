<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Repository\PersonnelRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Personnel', name: 'Personnel_')]
class PersonnelController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PersonnelRepository $personnelRepo): Response
    {
	
        return $this->render('Personnel/index.html.twig', [
            'controller_name' => 'PersonnelController',
		'personnels' => $personnelRepo->findAll(),
        ]);
    }
}
