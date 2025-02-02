<?php

namespace App\Controller;

use App\Repository\AdminRepository;
use App\Repository\AdulteRepository;
use App\Repository\CuisineRepository;
use App\Repository\DirectionRepository;
use App\Repository\DocumentalisteRepository;
use App\Repository\EleveRepository;
use App\Repository\EmpruntRepository;
use App\Repository\MatiereRepository;
use App\Repository\MessageRepository;
use App\Repository\OuvrageRepository;
use App\Repository\ParentEleveRepository;
use App\Repository\PersonnelRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\PromotionRepository;
use App\Repository\ReferentRepository;
use App\Repository\SecretariatRepository;
use App\Repository\SurveillantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DefaultController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function home(
        AdminRepository $adminRepo, 
        AdulteRepository $adulteRepo,
        CuisineRepository $cuisineRepo,
        DirectionRepository $directionRepo,
        DocumentalisteRepository $documentalisteRepo,
        EleveRepository $eleveRepo,
        EmpruntRepository $empruntRepo,
        MatiereRepository $matiereRepo,
        MessageRepository $messageRepo,
        OuvrageRepository $ouvrageRepo,
        ParentEleveRepository $parentEleveRepo,
        PersonnelRepository $personnelRepo,
        ProfesseurRepository $professeurRepo,
        PromotionRepository $promotionRepo,
        ReferentRepository $referentRepo,
        SecretariatRepository $secretariatRepo,
        SurveillantRepository $surveillantRepo
     ): Response {


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'admins' => $adminRepo->findAll(),
            'adultes' => $adulteRepo->findAll(),
            'cuisines' => $cuisineRepo->findAll(),
            'directions' => $directionRepo->findAll(),
            'documentalistes' => $documentalisteRepo->findAll(),
            'eleves' => $eleveRepo->findAll(),
            'emprunts' => $empruntRepo->findAll(),
            'matieres' => $matiereRepo->findAll(),
            'messages' => $messageRepo->findAll(),
            'ouvrages' => $ouvrageRepo->findAll(),
            'parentEleves' =>$parentEleveRepo->findAll(),
            'personnels' => $personnelRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'referents' => $referentRepo->findAll(),
            'secretariats' => $secretariatRepo->findAll(),
            'surveillants' =>$surveillantRepo->findAll(),
        ]);
    }
}
