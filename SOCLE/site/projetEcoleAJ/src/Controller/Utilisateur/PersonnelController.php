<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\PersonnelRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/personnel', name: 'personnel_')]
class PersonnelController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PersonnelRepository $personnelRepo): Response
    {
	
        return $this->render('utilisateur/personnel/index.html.twig', [
            'controller_name' => 'PersonnelController',
		    'titre' => 'Personnel',
            'personnels' => $personnelRepo->findAll(),
        ]);
    }
}
