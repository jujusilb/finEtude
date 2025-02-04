<?php

namespace App\Controller;

use App\Outils\CouteauSuisse;
use App\Repository\AdminRepository;
use App\Repository\AdulteRepository;
use App\Repository\CuisineRepository;
use App\Repository\DessertRepository;
use App\Repository\DirectionRepository;
use App\Repository\DocumentalisteRepository;
use App\Repository\EleveRepository;
use App\Repository\EmpruntRepository;
use App\Repository\EntreeRepository;
use App\Repository\FromageRepository;
use App\Repository\LegumeRepository;
use App\Repository\MatiereRepository;
use App\Repository\MenuRepository;
use App\Repository\MessageRepository;
use App\Repository\OuvrageRepository;
use App\Repository\ParentEleveRepository;
use App\Repository\PersonnelRepository;
use App\Repository\PlatRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\PromotionRepository;
use App\Repository\ReferentRepository;
use App\Repository\RepasRepository;
use App\Repository\SecretariatRepository;
use App\Repository\SurveillantRepository;
use App\Repository\ViandeRepository;
use Doctrine\ORM\Query\Expr\From;
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
        DessertRepository $dessertRepo,
        DirectionRepository $directionRepo,
        DocumentalisteRepository $documentalisteRepo,
        EleveRepository $eleveRepo,
        EmpruntRepository $empruntRepo,
        EntreeRepository $entreeRepo,
        FromageRepository $fromageRepo,
        LegumeRepository $legumeRepo,
        MatiereRepository $matiereRepo,
        MenuRepository $menuRepo,
        MessageRepository $messageRepo,
        OuvrageRepository $ouvrageRepo,
        ParentEleveRepository $parentEleveRepo,
        PersonnelRepository $personnelRepo,
        PlatRepository $platRepo,
        ProfesseurRepository $professeurRepo,
        PromotionRepository $promotionRepo,
        ReferentRepository $referentRepo,
        RepasRepository $repasRepo,
        SecretariatRepository $secretariatRepo,
        SurveillantRepository $surveillantRepo,
        ViandeRepository $viandeRepo
     ): Response {

        /*
        $r=["klmqjdlmsdg", "qdlmsfjld", ["qmsdjfùq", "mqsdklfjmlq"], "qsdfjql"];
        $debug= new CouteauSuisse();
        $debug->debug($r, "r");
        */
        //$debug= new CouteauSuisse();
        //$debug->debug($_SESSION, "session");

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'titre' => 'Accueil',
            'admins' => $adminRepo->findAll(),
            'adultes' => $adulteRepo->findAll(),
            'cuisines' => $cuisineRepo->findAll(),
            'desserts' => $dessertRepo->findAll(),
            'directions' => $directionRepo->findAll(),
            'documentalistes' => $documentalisteRepo->findAll(),
            'eleves' => $eleveRepo->findAll(),
            'emprunts' => $empruntRepo->findAll(),
            'entrees' => $entreeRepo->findAll(),
            'fromages' =>$fromageRepo->findAll(),
            'legumes' => $fromageRepo->findAll(),
            'matieres' => $matiereRepo->findAll(),
            'messages' => $messageRepo->findAll(),
            'menus' => $menuRepo->findAll(),
            'ouvrages' => $ouvrageRepo->findAll(),
            'parentEleves' =>$parentEleveRepo->findAll(),
            'personnels' => $personnelRepo->findAll(),
            'plats' => $platRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'referents' => $referentRepo->findAll(),
            'repas' =>$repasRepo->findAll(),
            'secretariats' => $secretariatRepo->findAll(),
            'surveillants' =>$surveillantRepo->findAll(),
            'viandes' => $viandeRepo->findAll()
        ]);
    }
}
