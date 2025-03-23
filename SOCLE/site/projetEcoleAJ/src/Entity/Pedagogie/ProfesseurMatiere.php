<?php

namespace App\Entity\Pedagogie;

use App\Entity\Utilisateur\Professeur;
use App\Repository\Pedagogie\ProfesseurMatiereRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurMatiereRepository::class)]
class ProfesseurMatiere
{
/*
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
*/
    #[ORM\Id()]
    #[ORM\ManyToOne(inversedBy: 'professeurMatiere')]
    private ?Professeur $professeur = null;

    #[ORM\Id()]
    #[ORM\ManyToOne(inversedBy: 'professeurMatiere')]
    private ?Matiere $matiere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): static
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): static
    {
        $this->matiere = $matiere;

        return $this;
    }
}
