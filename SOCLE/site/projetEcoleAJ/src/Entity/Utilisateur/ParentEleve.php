<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Adulte;
use App\Repository\Utilisateur\ParentEleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParentEleveRepository::class)]
class ParentEleve extends Adulte
{



    /**
     * @var Collection<int, Eleve>
     */
    #[ORM\ManyToMany(targetEntity: Eleve::class, inversedBy: 'parentEleves')]
    private Collection $eleves;

    

        public function __construct()
    {
        parent::__construct();
        $this->eleves = new ArrayCollection();
    }
    
    /**
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addEleve(Eleve $eleves): static
    {
        if (!$this->eleves->contains($eleves)) {
            $this->eleves->add($eleves);
        }

        return $this;
    }

    public function removeEleves(Eleve $eleves): static
    {
        $this->eleves->removeElement($eleves);

        return $this;
    }
}
