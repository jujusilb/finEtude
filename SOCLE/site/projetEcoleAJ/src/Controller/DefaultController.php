<?php

namespace App\Controller;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Membre;
use App\Entity\Communication\MessageGuest;
use App\Form\Communication\MessageGuestType;
use App\Entity\Utilisateur\Secretariat;
use App\Entity\Professionnel\ProfessionnelRepository;
use App\Repository\Utilisateur\AdminRepository;
use App\Repository\Utilisateur\AdulteRepository;
use App\Repository\Utilisateur\CuisineRepository;
use App\Repository\Cantine\DessertRepository;
use App\Repository\Utilisateur\DirectionRepository;
use App\Repository\Utilisateur\DocumentalisteRepository;
use App\Repository\Utilisateur\EleveRepository;
use App\Repository\CDI\EmpruntRepository;
use App\Repository\Cantine\EntreeRepository;
use App\Repository\Cantine\FromageRepository;
use App\Repository\Cantine\LegumeRepository;
use App\Repository\Pedagogie\MatiereRepository;
use App\Repository\Cantine\MenuRepository;
use App\Repository\Communication\MessageGuestRepository;
use App\Repository\CDI\OuvrageRepository;
use App\Repository\Utilisateur\ParentEleveRepository;
use App\Repository\Utilisateur\PersonnelRepository;
use App\Repository\Cantine\PlatRepository;
use App\Repository\Utilisateur\ProfesseurRepository;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Cantine\RepasRepository;
use App\Repository\Utilisateur\SecretariatRepository;
use App\Repository\Utilisateur\SurveillantRepository;
use App\Repository\Cantine\ViandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\From;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'root_accueil')]
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
        OuvrageRepository $ouvrageRepo,
        ParentEleveRepository $parentEleveRepo,
        PersonnelRepository $personnelRepo,
        PlatRepository $platRepo,
        ProfesseurRepository $professeurRepo,
        PromotionRepository $promotionRepo,
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
            'menus' => $menuRepo->findAll(),
            'ouvrages' => $ouvrageRepo->findAll(),
            'parentEleves' =>$parentEleveRepo->findAll(),
            'personnels' => $personnelRepo->findAll(),
            'plats' => $platRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'repas' =>$repasRepo->findAll(),
            'secretariats' => $secretariatRepo->findAll(),
            'surveillants' =>$surveillantRepo->findAll(),
            'viandes' => $viandeRepo->findAll()
        ]);
    }
    #[Route('/apropos', name: 'root_apropos')]
    public function apropos(){
        return $this->render('default/apropos.html.twig',[
            'titre' => 'Qui sommes-nous'
        ]);
    }

    #[Route('/legal', name: 'root_legal')]
    public function mentionsLegal(){
        return $this->render('default/legal.html.twig',[
            'titre' => 'Mentions Légales'
        ]);
    }


    #[Route('/contact', name: 'root_contact')]
    public function contact(EntityManagerInterface $entityManager, Request $request){
        $messageGuest = new MessageGuest();
        $form = $this->createForm(MessageGuestType::class, $messageGuest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageGuest->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($messageGuest);
            $entityManager->flush();

            return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('default/contact.html.twig', [
            'messageGuest' => $messageGuest,
            'titre' => 'Contactez-nous',
            'contactForm' => $form->createView(),
        ]);
    }
        
}
