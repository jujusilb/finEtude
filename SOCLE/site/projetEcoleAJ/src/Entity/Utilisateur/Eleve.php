<?php

namespace App\Entity\Utilisateur;

use App\Entity\Pedagogie\Promotion;
use App\Entity\Professionnel\Stage;
use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve extends Membre
{
    



    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotion $promotion = null;

    /**
     * @var Collection<int, ParentEleve>
     */
    #[ORM\ManyToMany(targetEntity: ParentEleve::class, mappedBy: 'eleve')]
    private Collection $parentEleves;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'stagiaire')]
    private Collection $stages;



    

        public function __construct()
    {
        parent::__construct();
        $this->parentEleves = new ArrayCollection();
        $this->stages = new ArrayCollection();
    }



    public function getPromotion(): ?Promotion{
        return $this->promotion;
    }
    public function setPromotion(?Promotion $promotion): static{
        $this->promotion = $promotion;
        return $this;
    }

    /**
     * @return Collection<int, ParentEleve>
     */
    public function getParentEleves(): Collection
    {
        return $this->parentEleves;
    }

    public function addParentEleve(ParentEleve $parentEleves): static
    {
        if (!$this->parentEleves->contains($parentEleves)) {
            $this->parentEleves->add($parentEleves);
            $parentEleves->addEleve($this);
        }

        return $this;
    }

    public function removeParentEleves(ParentEleve $parentEleves): static
    {
        if ($this->parentEleves->removeElement($parentEleves)) {
            $parentEleves->removeEleves($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStages(Stage $stages): static
    {
        if (!$this->stages->contains($stages)) {
            $this->stages->add($stages);
            $stages->setStagiaire($this);
        }

        return $this;
    }

    public function removeStages(Stage $stages): static
    {
        if ($this->stages->removeElement($stages)) {
            // set the owning side to null (unless already changed)
            if ($stages->getStagiaire() === $this) {
                $stages->setStagiaire(null);
            }
        }

        return $this;
    }

 
}
