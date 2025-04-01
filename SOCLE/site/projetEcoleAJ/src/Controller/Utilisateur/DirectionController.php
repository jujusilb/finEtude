<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Direction;
use App\Repository\Utilisateur\DirectionRepository;
use App\Form\Utilisateur\DirectionType;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/direction', name: 'direction_')]
class DirectionController extends AbstractController
{

    protected $passwordHasher;
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ){
        $this->entityManager = $entityManager;
        $this->passwordHasher=$passwordHasher;
    }

    #[Route('/', name: 'index')]
    public function index(directionRepository $directionRepo): Response
    {
        $directions=$directionRepo->findAll();
        $lineTitre="Id;Photo;Nom;Prenom;Username;E-mail;Nombre de Jeton;Date d'embauche;Poste\n";
        $contenu=$lineTitre;
        foreach($directions as $line){
            $contenu.=$line->getId().";";
            $contenu.=$line->getImageName().";";
            $contenu.=$line->getNom().";";
            $contenu.=$line->getPrenom().";";
            $contenu.=$line->getUsername().";";
            $contenu.=$line->getEmail().";";
            $contenu.=$line->getMembreJetons()->getNombreJeton().";";
            $contenu.=$line->getDateEmbauche()->format('d/m/Y').";";
            $contenu.=$line->getPoste()."\n";
        }
        file_put_contents("testFichierDirection.csv", $contenu);
        return $this->render('utilisateur/direction/index.html.twig', [
            'controller_name' => 'directionController',
            'titre' => 'Direction',
            'directions' => $directions,
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $direction = new Direction();
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($direction->getCreatedAt() === null) {
            $direction->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $direction->setRoles(["ROLE_DIRECTION"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($direction, $tmpPass);
            $direction->setPassword($hashTmpPass);
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $direction->setUsername($username);
            $direction->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $direction->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $direction->setImageName('man.png');
                }
            }
            $this->entityManager->persist($direction);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($direction);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/direction/new.html.twig', [
            'direction' => $direction,
            'titre' => 'Nouveau Direction',
            'directionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Direction $direction): Response
    {
        return $this->render('utilisateur/direction/show.html.twig', [
            'direction' => $direction,
            'titre' => 'Affichage Directon',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Direction $direction): Response
    {
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($direction, $tmpPass);
            $direction->setPassword($hashTmpPass);
            $this->entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/direction/edit.html.twig', [
            'direction' => $direction,
            'titre' => 'Edition Direction',
            'directionForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Direction $direction): Response
    {
        if ($this->isCsrfTokenValid('delete' . $direction->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($direction);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
    }
}
