<?php

namespace App\Controller;

use App\Entity\Documentaliste;

use App\Repository\DocumentalisteRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Documentaliste', name: 'Documentaliste_')]
class DocumentalisteController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(DocumentalisteRepository $documentalisteRepo): Response
    {
        return $this->render('Documentaliste/index.html.twig', [
            'controller_name' => 'DocumentalisteController',
            'Documentalistes' => $documentalisteRepo->findAll(),
        ]);
    }
}
