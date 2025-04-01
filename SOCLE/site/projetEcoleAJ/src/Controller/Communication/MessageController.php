<?php

namespace App\Controller\Communication;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MessageController extends AbstractController{
    #[Route('/communication/message', name: 'app_communication_message')]
    public function index(): Response
    {
        return $this->render('communication/message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
}
