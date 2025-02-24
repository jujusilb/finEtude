<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Repas;
use App\Entity\Utilisateur\Membre;
use App\Entity\Cantine\PlanningRepas;
use App\Repository\Cantine\PlanningRepasRepository;
use App\Form\Cantine\PlanningRepasType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/planningRepas', name: 'planningRepas_')]
class PlanningRepasController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PlanningRepasRepository $planningRepasRepo): Response
    {
	
        return $this->render('cantine/planning_repas/index.html.twig', [
            'controller_name' => 'PlanningRepasController',
		    'titre' => 'Planning repas',
            'planningRepass' => $planningRepasRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $planningRepas = new PlanningRepas();
        $form = $this->createForm(PlanningRepasType::class, $planningRepas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $planningRepas->setMembre($user);

            $entityManager->persist($planningRepas);
            $entityManager->flush();

            return $this->redirectToRoute('planningRepas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/planning_repas/new.html.twig', [
            'planningRepas' => $planningRepas,
            'titre' => 'Nouveau Planning repas',
            'planningRepasForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(PlanningRepas $planningRepas): Response
    {
        return $this->render('cantine/planning_repas/show.html.twig', [
            'planningRepas' => $planningRepas,
            'titre' => 'Affichage Planning repas',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlanningRepas $planningRepas, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(planningRepasType::class, $planningRepas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $planningRepas->setMembre($user);
            $entityManager->flush();

            return $this->redirectToRoute('planningRepas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/planning_repas/edit.html.twig', [
            'planningRepas' => $planningRepas,
            'titre' => 'Edition Planning repas',
            'planningRepasForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, PlanningRepas $planningRepas, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $planningRepas->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($planningRepas);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planningRepas_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/monPlanning', name: 'monPlanning')]
    public function mine(PlanningRepasRepository $planningRepasRepo): Response
    {
        $user=$this->getUser();
        if ($user instanceof Membre){
            return $this->render('cantine/planning_repas/monPlanning.html.twig', [
                'controller_name' => 'empruntController',
                'titre' => 'Mon planning',
                'planningRepass' =>$planningRepasRepo->findByMembre($user->getId()),
            ]);
        }else {
            return $this->redirectToRoute('emprunt_index');
        }
    }

    #[Route('/{repas}/achat', name: 'achat', methods: ['GET'])]
    public function achat (Repas $repas, PlanningRepasRepository $planningRepasRepo, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();

        
        $existingPlanning = $planningRepasRepo->findOneBy(['repas' => $repas, 'membre' => $user]);
    
        if ($existingPlanning) {
            return $this->redirectToRoute('repas_listeRepas');  // Rediriger avec un message ou rien faire
        }
        if($user instanceof Membre) {
            if ($user->getJetonRepas() > 0) {
                $user->setJetonRepas($user->getJetonRepas()-1);
                $planningRepas = new PlanningRepas();
                $planningRepas->setRepas($repas);
                $planningRepas->setMembre($user);
                $planningRepas->setDateAchat(new \DateTime());
                $entityManager ->persist($planningRepas);
                $entityManager->flush();
                return $this->redirectToRoute('repas_listeRepas');  // Redirection ou message de succès
            } else {
                return $this->redirectToRoute('repas_listeRepas');
            }
        } else {
            return $this->redirectToRoute('repas_listeRepas');
        }




        $user=$this->getUser();
        $planningRepas = new PlanningRepas();
    
            
            $planningRepas->setDateAchat(new DateTimeImmutable());
            $planningRepas->setMembre($user);
            $planningRepas->setRepas($repas);
            if ($user instanceof Membre){
                $jeton=$user->getJetonRepas();
                $jeton--;
                $user->setJetonRepas($jeton);
                $entityManager->persist($user);
            }
            $entityManager->persist($planningRepas);
            $entityManager->flush();

            return $this->redirectToRoute('planningRepas_index', [], Response::HTTP_SEE_OTHER);
        

        return $this->redirectToRoute('repas_index');;
    }

}
