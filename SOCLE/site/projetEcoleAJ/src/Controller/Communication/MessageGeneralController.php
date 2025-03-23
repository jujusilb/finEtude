<?php

   namespace App\Controller\Communication;

    use App\Entity\Utilisateur\Secretariat;
    use App\Entity\Communication\MessageGeneral;
    use App\Repository\Communication\MessageGeneralRepository;
    use App\Form\Communication\MessageGeneralType;
    use DateTimeImmutable;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;

    #[Route('/messageGeneral', name: 'messageGeneral_')]
    class MessageGeneralController extends AbstractController
    {
        #[Route('/index', name: 'index')]
        public function index(MessageGeneralRepository $messageGeneralRepo): Response
        {
            return $this->render('communication/message_general/index.html.twig', [
                'controller_name' => 'MessageGeneralController',
                'titre' => 'MessageGeneral',
                'messageGenerals' => $messageGeneralRepo->findAll()
            ]);
        }
        
        #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
        public function new (Request $request, EntityManagerInterface $entityManager): Response
        {
            $user=$this->getUser();
            if ($user instanceof Secretariat){
                $messageGeneral = new MessageGeneral();
                $form = $this->createForm(MessageGeneralType::class, $messageGeneral);
                $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
                    $messageGeneral->setExpediteur($user);
                    $entityManager->persist($messageGeneral);
                    $entityManager->flush();
                    return $this->redirectToRoute('messageGeneral_index', [], Response::HTTP_SEE_OTHER);
                }
        
                return $this->render('communication/message_general/new.html.twig', [
                    'messageGeneral' => $messageGeneral,
                    'titre' => 'Nouvel MessageGeneral',
                    'messageGeneralForm' => $form->createView(),
                ]);
            } else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);

        }

        #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
        public function show(MessageGeneral $messageGeneral): Response
        {
            return $this->render('communication/message_general/show.html.twig', [
                'messageGeneral' => $messageGeneral,
                'titre' => 'Affichage MessageGeneral',
            ]);
        }

        #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
        public function edit(Request $request, MessageGeneral $messageGeneral, EntityManagerInterface $entityManager): Response
        {
            $user=$this->getUser();
            if($user instanceof Secretariat){
                $form = $this->createForm(messageGeneralType::class, $messageGeneral);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();
                $messageGeneral->setUpdatedAt(new DateTimeImmutable());
                return $this->redirectToRoute('messageGeneral_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('communication/message_general/edit.html.twig', [
                'messageGeneral' => $messageGeneral,
                'titre' => 'Edition MessageGeneral',
                'messageGeneralForm' => $form,
            ]);
            }else return $this->redirectToRoute('root_accueil', [], Response::HTTP_SEE_OTHER);
            
        }

        #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
        public function delete(Request $request, MessageGeneral $messageGeneral, EntityManagerInterface $entityManager): Response
        {
            if ($this->isCsrfTokenValid('delete' . $messageGeneral->getId(), $request->getPayload()->getString('_token'))) {
                $entityManager->remove($messageGeneral);
                $entityManager->flush();
            }

            return $this->redirectToRoute('messageGeneral_index', [], Response::HTTP_SEE_OTHER);
        }
    }
