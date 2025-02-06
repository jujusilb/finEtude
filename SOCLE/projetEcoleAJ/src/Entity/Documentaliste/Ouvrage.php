<?php

namespace App\Entity\Documentaliste;

use App\Repository\Documentaliste\OuvrageRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvrageRepository::class)]
class Ouvrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\OneToOne(mappedBy: 'ouvrage', cascade: ['persist', 'remove'])]
    private ?Emprunt $emprunt = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    public function getId(): ?int{
        return $this->id;
    }

    public function getTitre(): ?string{
        return $this->titre;
    }

    public function setTitre(string $titre): static{
        $this->titre = $titre;
        return $this;
    }

    public function getStatut(): ?string{
        return $this->statut;
    }
    public function setStatut(string $statut): static{
        $this->statut = $statut;
        return $this;
    }

    public function getEmprunt(): ?Emprunt{
        return $this->emprunt;
    }
    public function setEmprunt(Emprunt $emprunt): static{
        // set the owning side of the relation if necessary
        if ($emprunt->getOuvrage() !== $this) {
            $emprunt->setOuvrage($this);
        }
        $this->emprunt = $emprunt;
        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;
        return $this;
    }
}
