<?php

namespace App\Entity\Utilisateur;

use App\Entity\Pedagogie\Promotion;
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



    

        public function __construct()
    {
        parent::__construct();
        $this->parentEleves = new ArrayCollection();
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

    public function addParentElefe(ParentEleve $parentElefe): static
    {
        if (!$this->parentEleves->contains($parentElefe)) {
            $this->parentEleves->add($parentElefe);
            $parentElefe->addEleve($this);
        }

        return $this;
    }

    public function removeParentElefe(ParentEleve $parentElefe): static
    {
        if ($this->parentEleves->removeElement($parentElefe)) {
            $parentElefe->removeEleve($this);
        }

        return $this;
    }
}
