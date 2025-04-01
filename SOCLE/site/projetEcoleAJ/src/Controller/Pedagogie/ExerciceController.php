<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\Exercice;
use App\Repository\Pedagogie\ExerciceRepository;
use App\Form\Pedagogie\ExerciceType;
use App\Repository\Pedagogie\MatiereRepository;
use DateTimeImmutable;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/exercice', name: 'exercice_')]
class ExerciceController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    
    #[Route('/', name: 'index')]
    public function index(MatiereRepository $matiereRepo, ExerciceRepository $exerciceRepo): Response
    {
	
        return $this->render('pedagogie/exercice/index.html.twig', [
            'controller_name' => 'ExerciceController',
		    'titre' => 'Exercice',
            'exercices' => $exerciceRepo->findAll(),
            'matieres' =>$matiereRepo->findAll()
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $exercice = new Exercice();
        $form = $this->createForm(ExerciceType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exercice->setDate(new DateTimeImmutable());
            $exercice->setProfesseur($this->getUser());
            $this->entityManager->persist($exercice);
            $this->entityManager->flush();

            return $this->redirectToRoute('exercice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/exercice/new.html.twig', [
            'exercice' => $exercice,
            'titre' => 'Nouvel Exercice',
            'exerciceForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Exercice $exercice): Response
    {
        return $this->render('pedagogie/exercice/show.html.twig', [
            'exercice' => $exercice,
            'titre' => 'Affichage Exercice',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exercice $exercice): Response
    {
        $form = $this->createForm(exerciceType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('exercice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/exercice/edit.html.twig', [
            'exercice' => $exercice,
            'titre' => 'Edition Exercice',
            'exerciceForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Exercice $exercice): Response
    {
        if ($this->isCsrfTokenValid('delete' . $exercice->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($exercice);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('exercice_index', [], Response::HTTP_SEE_OTHER);
    }


}
