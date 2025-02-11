<?php

namespace App\Entity\Documentaliste;

use App\Repository\Documentaliste\CategorieOuvrageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieOuvrageRepository::class)]
class CategorieOuvrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Ouvrage>
     */
    #[ORM\ManyToMany(targetEntity: Ouvrage::class, mappedBy: 'categorieOuvrage')]
    private Collection $Ouvrages;

    public function __construct()
    {
        $this->Ouvrages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Ouvrage>
     */
    public function getOuvrages(): Collection
    {
        return $this->Ouvrages;
    }

    public function addOuvrage(Ouvrage $ouvrage): static
    {
        if (!$this->Ouvrages->contains($ouvrage)) {
            $this->Ouvrages->add($ouvrage);
            $ouvrage->addCategorieOuvrage($this);
        }

        return $this;
    }

    public function removeOuvrage(Ouvrage $ouvrage): static
    {
        if ($this->Ouvrages->removeElement($ouvrage)) {
            $ouvrage->removeCategorieOuvrage($this);
        }

        return $this;
    }
}
