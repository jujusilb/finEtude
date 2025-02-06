<?php

namespace App\Entity\Pedagogie;

use App\Entity\Utilisateur\Professeur;	
use App\Entity\Pedagogie\Promotion;
use App\Repository\Pedagogie\ReferentRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferentRepository::class)]
class Referent 
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'referent', cascade: ['persist', 'remove'])]
    private ?Promotion $promotion = null;

    #[ORM\OneToOne(inversedBy: 'referent', cascade: ['persist', 'remove'])]
    private ?professeur $professeur = null;


    
    public function getId(){
        return $this->id;
    }
    public function getPromotion(): ?Promotion{
        return $this->promotion;
    }
    public function setPromotion(Promotion $promotion): static{
        if ($promotion->getReferent() !== $this) {
            $promotion->setReferent($this);
        }
        $this->promotion = $promotion;
        return $this;
    }

    public function getProfesseur(): ?professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?professeur $professeur): static
    {
        $this->professeur = $professeur;

        return $this;
    }

}
