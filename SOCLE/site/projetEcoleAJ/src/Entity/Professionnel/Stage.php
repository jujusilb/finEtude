<?php

namespace App\Entity\Professionnel;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Professionnel\Professionnel;
use App\Entity\Utilisateur\Eleve;
use App\Repository\Professionnel\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
   

    #[ORM\ManyToOne(inversedBy: 'stages')]
    private ?Professionnel $responsable = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 255,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $fonction = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\ManyToOne(inversedBy: 'stageB')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Eleve $stagiaire = null;

    #[ORM\ManyToOne(inversedBy: 'stages')]
    private ?Entreprise $entreprise = null;

    public function __construct()
    {
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }




    public function getResponsable(): ?Professionnel
    {
        return $this->responsable;
    }

    public function setResponsable(?Professionnel $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getStagiaire(): ?Eleve
    {
        return $this->stagiaire;
    }

    public function setStagiaire(?Eleve $stagiaire): static
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
