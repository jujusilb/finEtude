<?php

namespace App\Controller\Cantine;

use App\Repository\Cantine\ViandeRepository;
use App\Repository\Cantine\LegumeRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cantine\Plat;
use App\Repository\Cantine\PlatRepository;
use App\Form\Cantine\PlatType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/plat', name: 'plat_')]
class PlatController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        PlatRepository $platRepo,
        ViandeRepository $viandeRepo,
        LegumeRepository $legumeRepo
        ): Response
    {
	
        return $this->render('cantine/plat/index.html.twig', [
            'controller_name' => 'PlatController',
            'titre' => 'Plat',
            'plats' => $platRepo->findAll(),
            'viandes' =>$viandeRepo->findAll(),
            'legumes' =>$legumeRepo->findAll()
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $plat = new Plat();
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $viande =$plat->getViande()->getLibelle();
            $legume=$plat->getLegume()->getLibelle();
            $libelle= $viande.' '.$legume;
            $plat->setLibelle($libelle);
            $this->entityManager->persist($plat);
            $this->entityManager->flush();

            return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/plat/new.html.twig', [
            'plat' => $plat,
            'titre' => 'Nouveau Plat',
            'platForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Plat $plat): Response
    {
        return $this->render('cantine/plat/show.html.twig', [
            'plat' => $plat,
            'titre' => 'Affichage '.$plat->getLibelle(),

        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plat $plat): Response
    {
        $form = $this->createForm(platType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$plat->getLibelle()){
                $viande =$plat->getViande()->getLibelle();
                $legume=$plat->getLegume()->getLibelle();
                $libelle= $viande.' - '.$legume;
                $plat->setLibelle($libelle);
            }
            
            $this->entityManager->flush();

            return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/plat/edit.html.twig', [
            'plat' => $plat,
            'titre' => 'Edition Plat',
            'platForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Plat $plat): Response
    {
        if ($this->isCsrfTokenValid('delete' . $plat->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($plat);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
    }
}
