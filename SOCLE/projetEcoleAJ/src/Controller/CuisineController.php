<?php

namespace App\Controller;

use App\Entity\Cuisine;

use App\Repository\CuisineRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cuisine', name: 'cuisine_')]
class CuisineController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(cuisineRepository $cuisineRepo): Response
    {
        return $this->render('cuisine/index.html.twig', [
            'controller_name' => 'cuisineController',
            'cuisines' => $cuisineRepo->findAll(),
        ]);
    }
}
