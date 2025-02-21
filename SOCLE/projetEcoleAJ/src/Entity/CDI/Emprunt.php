<?php
namespace App\Entity\CDI;

use App\Entity\Utilisateur\Membre;
use App\Repository\CDI\EmpruntRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]  // Nullable (dateEmprunt peut être null)
    private ?\DateTimeInterface $dateEmprunt = null;

    #[ORM\Column(length: 255, nullable: false)]  // Non nullable
    private string $statut;

    #[ORM\ManyToOne(targetEntity: Membre::class, inversedBy: 'emprunt')]
    #[ORM\Column( nullable: false)]
    private Membre $membre;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]  // Non nullable
    private Ouvrage $ouvrage;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: false)]  // Non nullable
    private \DateTimeInterface $dateDemande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(?\DateTimeInterface $dateEmprunt): static
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getMembre(): Membre
    {
        return $this->membre;
    }

    public function setMembre(Membre $membre): static
    {
        $this->membre = $membre;

        return $this;
    }

    public function getOuvrage(): Ouvrage
    {
        return $this->ouvrage;
    }

    public function setOuvrage(Ouvrage $ouvrage): static
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    public function getDateDemande(): \DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): static
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }
}
