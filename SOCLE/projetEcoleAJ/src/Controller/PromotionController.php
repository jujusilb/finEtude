<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Repository\PromotionRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Promotion', name: 'Promotion_')]
class PromotionController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PromotionRepository $promotionRepo): Response
    {
	
        return $this->render('Promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
		'promotions' => $promotionRepo->findAll(),
        ]);
    }
}
