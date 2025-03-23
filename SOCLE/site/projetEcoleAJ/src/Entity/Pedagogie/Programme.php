<?php

namespace App\Entity\Pedagogie;

use App\Entity\Utilisateur\Professeur;
use App\Repository\Pedagogie\ProgrammeRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgrammeRepository::class)]
#[ORM\Table(
    name: "programme",
    uniqueConstraints: [
        new ORM\UniqueConstraint(name: 'unique_promotion_matiere', columns: ['promotion', 'matiere'])
    ]
)]
class Programme
{
/*
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
*/
#[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'programme')]
    private ?Professeur $professeur = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'programme')]
    private ?Matiere $matiere = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Promotion::class, inversedBy: 'programme')]
    private ?Promotion $promotion = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'promotion')]
    private Collection $programme;

    public function __construct()
    {
        $this->programme = new ArrayCollection();
    }

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

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getProgramme(): Collection
    {
        return $this->programme;
    }

    public function addProgramme(self $programme): static
    {
        if (!$this->programme->contains($programme)) {
            $this->programme->add($programme);
            $programme->setPromotion($this);
        }

        return $this;
    }

    public function removeProgramme(self $programme): static
    {
        if ($this->programme->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getPromotion() === $this) {
                $programme->setPromotion(null);
            }
        }

        return $this;
    }
}
