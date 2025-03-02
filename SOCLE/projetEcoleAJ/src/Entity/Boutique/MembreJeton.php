<?php

namespace App\Entity\Boutique;

use App\Entity\Utilisateur\Membre;
use App\Repository\Boutique\MembreJetonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreJetonRepository::class)]
class MembreJeton
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'membreJetons')]
    private ?Membre $membre = null;

    #[ORM\Column]
    private ?int $nombreJeton = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): static
    {
        $this->membre = $membre;

        return $this;
    }

    public function getNombreJeton(): ?int
    {
        return $this->nombreJeton;
    }

    public function setNombreJeton(int $nombreJeton): static
    {
        $this->nombreJeton = $nombreJeton;

        return $this;
    }
}
