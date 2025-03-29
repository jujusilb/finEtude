<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Repas;
use App\Entity\Utilisateur\Membre;
use App\Entity\Cantine\ReservationRepas;
use App\Repository\Cantine\ReservationRepasRepository;
use App\Form\Cantine\ReservationRepasType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/reservationRepas', name: 'reservationRepas_')]
class ReservationRepasController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ReservationRepasRepository $reservationRepasRepo): Response
    {
	
        return $this->render('cantine/reservation_repas/index.html.twig', [
            'controller_name' => 'ReservationRepasController',
		    'titre' => 'Reservation repas',
            'reservationRepass' => $reservationRepasRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $reservationRepas = new ReservationRepas();
        $form = $this->createForm(ReservationRepasType::class, $reservationRepas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $reservationRepas->setMembre($user);

            $this->entityManager->persist($reservationRepas);
            $this->entityManager->flush();

            return $this->redirectToRoute('reservationRepas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/reservation_repas/new.html.twig', [
            'reservationRepas' => $reservationRepas,
            'titre' => 'Nouveau Reservation repas',
            'reservationRepasForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(ReservationRepas $reservationRepas): Response
    {
        return $this->render('cantine/reservation_repas/show.html.twig', [
            'reservationRepas' => $reservationRepas,
            'titre' => 'Affichage '.$reservationRepas->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReservationRepas $reservationRepas): Response
    {
        $form = $this->createForm(reservationRepasType::class, $reservationRepas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$this->getUser();
            $reservationRepas->setMembre($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('reservationRepas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/reservation_repas/edit.html.twig', [
            'reservationRepas' => $reservationRepas,
            'titre' => 'Edition Reservation repas',
            'reservationRepasForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, ReservationRepas $reservationRepas): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reservationRepas->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($reservationRepas);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('reservationRepas_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/mesReservations', name: 'mesReservations')]
    public function mine(ReservationRepasRepository $reservationRepasRepo): Response
    {
        $user=$this->getUser();
        if ($user instanceof Membre){
            return $this->render('cantine/reservation_repas/mesReservations.html.twig', [
                'controller_name' => 'empruntController',
                'titre' => 'Mes reservations',
                'reservationRepass' =>$reservationRepasRepo->findByMembre($user->getId()),
            ]);
        }else {
            return $this->redirectToRoute('emprunt_index');
        }
    }

    #[Route('/{repas}/achat', name: 'achat', methods: ['GET'])]
    public function achat (Repas $repas, ReservationRepasRepository $reservationRepasRepo): Response
    {

        $user = $this->getUser();

        
        $existingReservation = $reservationRepasRepo->findOneBy(['repas' => $repas, 'membre' => $user]);
    
        if ($existingReservation) {
            return $this->redirectToRoute('repas_listeRepas');  // Rediriger avec un message ou rien faire
        }
        if($user instanceof Membre) {
            if ($user->getMembreJetons()->getNombreJeton() > 0) {
                $user->getMembreJetons()->setNombreJeton($user->getMembreJetons()->getNombreJeton()-1);
                $reservationRepas = new ReservationRepas();
                $reservationRepas->setRepas($repas);
                $reservationRepas->setMembre($user);
                $reservationRepas->setDateAchat(new \DateTime());
                $this->entityManager ->persist($reservationRepas);
                $this->entityManager->flush();
                return $this->redirectToRoute('repas_listeRepas');  // Redirection ou message de succès
            } else {
                return $this->redirectToRoute('repas_listeRepas');
            }
        } else {
            return $this->redirectToRoute('repas_listeRepas');
        }




        $user=$this->getUser();
        $reservationRepas = new ReservationRepas();
    
            
            $reservationRepas->setDateAchat(new DateTimeImmutable());
            $reservationRepas->setMembre($user);
            $reservationRepas->setRepas($repas);
            if ($user instanceof Membre){
                $jeton=$user->getJetonRepas();
                $jeton--;
                $user->setJetonRepas($jeton);
                $this->entityManager->persist($user);
            }
            $this->entityManager->persist($reservationRepas);
            $this->entityManager->flush();

            return $this->redirectToRoute('reservationRepas_index', [], Response::HTTP_SEE_OTHER);
        

        return $this->redirectToRoute('repas_index');;
    }

}
