<?php

namespace App\Entity\Pedagogie;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Pedagogie\PoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoleRepository::class)]
class Pole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Personnel>
     */
    #[ORM\ManyToMany(targetEntity: Personnel::class, mappedBy: 'pole')]
    private Collection $personnels;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
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
     * @return Collection<int, Personnel>
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): static
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels->add($personnel);
            $personnel->addPole($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): static
    {
        if ($this->personnels->removeElement($personnel)) {
            $personnel->removePole($this);
        }

        return $this;
    }
}
