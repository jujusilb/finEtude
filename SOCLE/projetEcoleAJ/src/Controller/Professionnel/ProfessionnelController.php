<?php

namespace App\Controller\Professionnel;

use App\Entity\Professionnel\Professionnel;
use App\Repository\Professionnel\ProfessionnelRepository;
use App\Form\Professionnel\ProfessionnelType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/professionnel', name: 'professionnel_')]
class ProfessionnelController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ProfessionnelRepository $professionnelRepo): Response
    {
	
        return $this->render('professionnel/professionnel/index.html.twig', [
            'controller_name' => 'ProfessionnelController',
		    'titre' => 'Professionnel',
            'professionnels' => $professionnelRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $professionnel = new Professionnel();
        $form = $this->createForm(ProfessionnelType::class, $professionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($professionnel);
            $entityManager->flush();

            return $this->redirectToRoute('professionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/professionnel/new.html.twig', [
            'professionnel' => $professionnel,
            'titre' => 'Nouvel Professionnel',
            'professionnelForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Professionnel $professionnel): Response
    {
        return $this->render('professionnel/professionnel/show.html.twig', [
            'professionnel' => $professionnel,
            'titre' => 'Affichage Professionnel',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Professionnel $professionnel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(professionnelType::class, $professionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('professionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/professionnel/edit.html.twig', [
            'professionnel' => $professionnel,
            'titre' => 'Edition Professionnel',
            'professionnelForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Professionnel $professionnel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $professionnel->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($professionnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professionnel_index', [], Response::HTTP_SEE_OTHER);
    }


}
