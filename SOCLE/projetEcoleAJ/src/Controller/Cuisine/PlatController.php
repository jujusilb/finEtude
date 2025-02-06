<?php

namespace App\Controller\Cuisine;

use App\Repository\Cuisine\ViandeRepository;
use App\Repository\Cuisine\LegumeRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cuisine\Plat;
use App\Repository\Cuisine\PlatRepository;
use App\Form\Cuisine\PlatType;

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
	
        return $this->render('Plat/index.html.twig', [
            'controller_name' => 'PlatController',
            'titre' => 'Plat',
            'plats' => $platRepo->findAll(),
            'viandes' =>$viandeRepo->findAll(),
            'legumes' =>$legumeRepo->findAll()
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $plat = new Plat();
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plat);
            $entityManager->flush();

            return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('plat/new.html.twig', [
            'plat' => $plat,
            'platForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Plat $plat): Response
    {
        return $this->render('plat/show.html.twig', [
            'plat' => $plat,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plat $plat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(platType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('plat/edit.html.twig', [
            'plat' => $plat,
            'platForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Plat $plat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $plat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plat_index', [], Response::HTTP_SEE_OTHER);
    }
}
