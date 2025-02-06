<?php

namespace App\Entity\Utilisateur;

use App\Entity\Pedagogie\Referent;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Entity\Pedagogie\Programme;
use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\ProfesseurRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "professeur" => Professeur::class, 
    "referent" => Referent::class, 
    ])]
class Professeur extends Personnel{

    


    #[ORM\OneToOne(mappedBy: 'professeur', cascade: ['persist', 'remove'])]
    private ?Referent $referent = null;

    /**
     * @var Collection<int, ProfesseurMatiere>
     */
    #[ORM\OneToMany(targetEntity: ProfesseurMatiere::class, mappedBy: 'professeur')]
    private Collection $professeurMatiere;

    /**
     * @var Collection<int, Programme>
     */
    #[ORM\OneToMany(targetEntity: Programme::class, mappedBy: 'professeur')]
    private Collection $programme;

    

    public function __construct()
    {
        //$this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->professeurMatiere = new ArrayCollection();
        $this->programme = new ArrayCollection();

    }



    




    public function getReferent(): ?Referent
    {
        return $this->referent;
    }

    public function setReferent(?Referent $referent): static
    {
        // unset the owning side of the relation if necessary
        if ($referent === null && $this->referent !== null) {
            $this->referent->setProfesseur(null);
        }

        if ($referent !== null && $referent->getProfesseur() !== $this) {
            $referent->setProfesseur($this);
        }

        $this->referent = $referent;

        return $this;
    }

    /**
     * @return Collection<int, ProfesseurMatiere>
     */
    public function getProfesseurMatiere(): Collection
    {
        return $this->professeurMatiere;
    }

    public function addProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if (!$this->professeurMatiere->contains($professeurMatiere)) {
            $this->professeurMatiere->add($professeurMatiere);
            $professeurMatiere->setProfesseur($this);
        }

        return $this;
    }

    public function removeProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if ($this->professeurMatiere->removeElement($professeurMatiere)) {
            // set the owning side to null (unless already changed)
            if ($professeurMatiere->getProfesseur() === $this) {
                $professeurMatiere->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Programme>
     */
    public function getProgramme(): Collection
    {
        return $this->programme;
    }

    public function addProgramme(Programme $programme): static
    {
        if (!$this->programme->contains($programme)) {
            $this->programme->add($programme);
            $programme->setProfesseur($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): static
    {
        if ($this->programme->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getProfesseur() === $this) {
                $programme->setProfesseur(null);
            }
        }

        return $this;
    }









}
