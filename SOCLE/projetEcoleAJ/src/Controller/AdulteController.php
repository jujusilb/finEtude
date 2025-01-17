<?php

namespace App\Controller;

use App\Entity\Adulte;

use App\Repository\AdulteRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Adulte', name: 'Adulte_')]
class AdulteController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(AdulteRepository $AdulteRepo): Response
    {
        return $this->render('Adulte/index.html.twig', [
            'controller_name' => 'AdulteController',
            'Adultes' => $AdulteRepo->findAll(),
        ]);
    }
}
