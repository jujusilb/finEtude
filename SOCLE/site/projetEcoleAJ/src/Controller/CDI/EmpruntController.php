<?php

namespace App\Controller\CDI;

use App\Entity\CDI\Emprunt;

use App\Entity\Utilisateur\Documentaliste;
use App\Entity\CDI\Ouvrage;
use App\Entity\CDI\StatutOuvrage;
use App\Entity\Utilisateur\Membre;
use App\Repository\CDI\EmpruntRepository;
use App\Repository\CDI\StatutEmpruntRepository;
use App\Form\CDI\EmpruntType;
use App\Repository\Utilisateur\MembreRepository;
use App\Repository\CDI\OuvrageRepository;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/emprunt', name: 'emprunt_')]
class EmpruntController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(
        EmpruntRepository $empruntRepo, 
        MembreRepository $membreRepo, 
        OuvrageRepository $ouvrageRepo
    ): Response
    {
        return $this->render('CDI/emprunt/index.html.twig', [
            'controller_name' => 'EmpruntController',
            'titre' => 'Emprunt',
            'emprunts' => $empruntRepo->findAll(),
            'membre' => $membreRepo->findAll(),
            'ouvrage' => $ouvrageRepo->findAll(),
        ]);
    }

    #[Route('/{id}/demande', name: 'demande', methods: ['GET', 'POST'])]
    public function new (Ouvrage $ouvrage, StatutEmpruntRepository $statutEmpruntRepo, MembreRepository $membreRepo, Request $request, OuvrageRepository $ouvrageRepo): Response
    {
        $emprunt = new Emprunt();
        $user=$this->getUser();
        $userId=$user->getId();
        //$form->get('membre_id')->setData($userId);

        $emprunt->setDateDemande(new \DateTimeImmutable());
            $statutEmprunt=$statutEmpruntRepo->getStatutEmprunt("Emprunt demandé");
        $emprunt->setStatut($statutEmprunt);
            
            $membre=$this->entityManager->getRepository(Membre::class)->find($userId);
            if ($membre instanceof Membre){
                $emprunt->setMembre($membre);
            }
            if ($ouvrage instanceof Ouvrage){
                $emprunt->setOuvrage($ouvrage);
            }
            $statutOuvrage=$this->entityManager->getRepository(StatutOuvrage::class)->find(4);
            if ($statutOuvrage instanceof StatutOuvrage){
                $ouvrage->setStatutOuvrage($statutOuvrage);
            }
            $this->entityManager->persist($emprunt);
            $this->entityManager->persist($ouvrage);
            $this->entityManager->flush();

            return $this->redirectToRoute('ouvrage_catalogue');
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Emprunt $emprunt): Response
    {
        return $this->render('CDI/emprunt/show.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Affichage Emprunt',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Emprunt $emprunt): Response
    {
        $form = $this->createForm(empruntType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/emprunt/edit.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Edition Emprunt',
            'empruntForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Emprunt $emprunt): Response
    {
        if ($this->isCsrfTokenValid('delete' . $emprunt->getId(), $request->getPayload()->getString('_token'))) {
            $statutOuvrage= $this->entityManager->getRepository(StatutOuvrage::class)->find(3);
            $ouvrage=$emprunt->getOuvrage();
            $ouvrage->setStatutOuvrage($statutOuvrage);
            $this->entityManager->persist($ouvrage);
            $this->entityManager->remove($emprunt);
            
            $this->entityManager->flush();
        }
        $user=$this->getUser();
        if ($user instanceof Documentaliste){
            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        } else return $this->redirectToRoute('emprunt_mesEmpunt', [], Response::HTTP_SEE_OTHER);
        
    }

    #[Route('/ouvrageTitre/{titre}', name: 'getOuvrageTitre', methods: ['GET'])]
    public function getOuvrageTitre(string $titre, OuvrageRepository $ouvrageRepo): Response
    {
        $data=$ouvrageRepo->getTitre($titre);
        return $this->json($data);
    }

    #[Route('/membreLibelle/{libelle}', name: 'getMembreLibelle', methods: ['GET'])]
    public function getMembreLibelle(string $libelle, MembreRepository $membreRepo): Response
    {
        $data=$membreRepo->getConcatNames($libelle);
        return $this->json($data);
    }


    #[Route('/mesEmprunts', name: 'mesEmprunts')]
    public function mine(EmpruntRepository $empruntRepo): Response
    {
        $user=$this->getUser();
        if ($user instanceof Membre){
            return $this->render('CDI/emprunt/mesEmprunts.html.twig', [
                'controller_name' => 'empruntController',
                'titre' => 'Mes emprunts',
                'emprunts' =>$empruntRepo->findByMembre($user->getId()),
            ]);
        }else {
            return $this->redirectToRoute('emprunt_index');
        }
    }

/*

#[Route('/{id}/demande', name: 'demande', methods: ['GET', 'POST'])]
    public function new (Ouvrage $Ouvrage, StatutEmpruntRepository $statutEmpruntRepo, MembreRepository $membreRepo, Request $request, OuvrageRepository $ouvrageRepo): Response
    {
        $emprunt = new Emprunt();
        $form = $this->createForm(EmpruntType::class, $emprunt);
        $user=$this->getUser();
        $userId=$user->getId();
        
        $form->handleRequest($request);
        //$form->get('membre_id')->setData($userId);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $emprunt->setDateDemande(new \DateTimeImmutable());
            $statutEmprunt=$statutEmpruntRepo->getStatutEmprunt("Emprunt demandé");
            $emprunt->setStatut($statutEmprunt);
            $ouvrageId = $form->get('ouvrage_id')->getData(); // This will give you the ID (a string)
            $membre=$this->entityManager->getRepository(Membre::class)->find($userId);
            if ($membre instanceof Membre){
                $emprunt->setMembre($membre);
            }
            $ouvrage = $this->entityManager->getRepository(Ouvrage::class)->find($ouvrageId); // Fetch the actual Entree object by ID
            if ($ouvrage instanceof Ouvrage){
                $emprunt->setOuvrage($ouvrage);
            }
            $ouvrage->setStatut("Emprunt demandé");
            $this->entityManager->persist($emprunt);
            $this->entityManager->persist($ouvrage);
            
            $this->entityManager->flush();

            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/emprunt/new.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Nouvel Emprunt',
            'empruntForm' => $form->createView(),
        ]);
    }
    */



}
