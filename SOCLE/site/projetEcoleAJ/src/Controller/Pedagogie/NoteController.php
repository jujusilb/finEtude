<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\Note;
use App\Repository\Pedagogie\NoteRepository;
use App\Form\Pedagogie\NoteType;
use App\Entity\Utilisateur\Professeur;
use App\Repository\Pedagogie\MatiereRepository;
use DateTimeImmutable;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/note', name: 'note_')]
class NoteController extends AbstractController
{

    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(MatiereRepository $matiereRepo, NoteRepository $noteRepo) : Response
    {

        return $this->render('pedagogie/note/index.html.twig', [
            'controller_name' => 'NoteController',
		    'titre' => 'Note',
            'notes' => $noteRepo->findAll(),
            'matieres' =>$matiereRepo->findAll()
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $user=$this->getUser();
        if($user instanceof Professeur){
            $note = new Note();
            $form = $this->createForm(NoteType::class, $note);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $note->setProfesseur($user);
                $this->entityManager->persist($note);
                $this->entityManager->flush();

                return $this->redirectToRoute('note_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('pedagogie/note/new.html.twig', [
                'note' => $note,
                'titre' => 'Nouvel Note',
                'noteForm' => $form->createView(),
            ]);
        }
        
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Note $note): Response
    {
        return $this->render('pedagogie/note/show.html.twig', [
            'note' => $note,
            'titre' => 'Affichage Note',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Note $note): Response
    {
        $user=$this->getUser();
        if ($user instanceof Professeur){
             $form = $this->createForm(noteType::class, $note);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $note->setProfesseur($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('note_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/note/edit.html.twig', [
            'note' => $note,
            'titre' => 'Edition Note',
            'noteForm' => $form,
        ]);
        }
       
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Note $note): Response
    {
        if ($this->isCsrfTokenValid('delete' . $note->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($note);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('note_index', [], Response::HTTP_SEE_OTHER);
    }


}
