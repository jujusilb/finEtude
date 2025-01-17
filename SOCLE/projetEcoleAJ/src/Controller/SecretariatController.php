<?php

namespace App\Controller;

use App\Entity\Secretariat;
use App\Repository\SecretariatRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Secretariat', name: 'Secretariat_')]
class SecretariatController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(SecretariatRepository $secretariatRepo): Response
    {
	
        return $this->render('Secretariat/index.html.twig', [
            'controller_name' => 'SecretariatController',
		'secretariats' => $secretariatRepo->findAll(),
        ]);
    }
}
