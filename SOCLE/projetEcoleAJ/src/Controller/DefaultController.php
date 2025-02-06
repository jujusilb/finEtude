<?php

namespace App\Controller;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\AdminRepository;
use App\Repository\Utilisateur\AdulteRepository;
use App\Repository\Utilisateur\CuisineRepository;
use App\Repository\Cuisine\DessertRepository;
use App\Repository\Utilisateur\DirectionRepository;
use App\Repository\Utilisateur\DocumentalisteRepository;
use App\Repository\Utilisateur\EleveRepository;
use App\Repository\Documentaliste\EmpruntRepository;
use App\Repository\Cuisine\EntreeRepository;
use App\Repository\Cuisine\FromageRepository;
use App\Repository\Cuisine\LegumeRepository;
use App\Repository\Pedagogie\MatiereRepository;
use App\Repository\Cuisine\MenuRepository;
use App\Repository\Forum\MessageRepository;
use App\Repository\Documentaliste\OuvrageRepository;
use App\Repository\Utilisateur\ParentEleveRepository;
use App\Repository\Utilisateur\PersonnelRepository;
use App\Repository\Cuisine\PlatRepository;
use App\Repository\Utilisateur\ProfesseurRepository;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Pedagogie\ReferentRepository;
use App\Repository\Cuisine\RepasRepository;
use App\Repository\Utilisateur\SecretariatRepository;
use App\Repository\Utilisateur\SurveillantRepository;
use App\Repository\Cuisine\ViandeRepository;

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
