<?php

namespace App\Controller\Professionnel;


use App\Entity\Professionnel\Entreprise;
use App\Repository\Professionnel\EntrepriseRepository;
use App\Form\Professionnel\EntrepriseType;

;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/entreprise', name: 'entreprise_')]
class EntrepriseController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(EntrepriseRepository $entrepriseRepo): Response
    {
	
        return $this->render('professionnel/entreprise/index.html.twig', [
            'controller_name' => 'EntrepriseController',
		    'titre' => 'Entreprise',
            'entreprises' => $entrepriseRepo->findAll(),
        ]);
    }

    #[Route('/liste', name: 'liste')]
    public function liste(EntrepriseRepository $entrepriseRepo): Response
    {
	
        return $this->render('professionnel/entreprise/liste.html.twig', [
            'controller_name' => 'EntrepriseController',
		    'titre' => 'Entreprise',
            'entreprises' => $entrepriseRepo->findAll(),
        ]);
    }


    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($entreprise);
            $this->entityManager->flush();

            return $this->redirectToRoute('entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/entreprise/new.html.twig', [
            'entreprise' => $entreprise,
            'titre' => 'Nouvel Entreprise',
            'entrepriseForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Entreprise $entreprise): Response
    {
        return $this->render('professionnel/entreprise/show.html.twig', [
            'entreprise' => $entreprise,
            'titre' => 'Affichage Entreprise',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entreprise $entreprise): Response
    {
        $form = $this->createForm(entrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/entreprise/edit.html.twig', [
            'entreprise' => $entreprise,
            'titre' => 'Edition Entreprise',
            'entrepriseForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Entreprise $entreprise): Response
    {
        if ($this->isCsrfTokenValid('delete' . $entreprise->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($entreprise);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('entreprise_index', [], Response::HTTP_SEE_OTHER);
    }


}
