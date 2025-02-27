<?php

namespace App\Controller\Etablissement;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BoutiqueController extends AbstractController{
    #[Route('/etablissement/boutique', name: 'app_etablissement_boutique')]
    public function index(): Response
    {
        return $this->render('etablissement/boutique/index.html.twig', [
            'controller_name' => 'BoutiqueController',
        ]);
    }
}
