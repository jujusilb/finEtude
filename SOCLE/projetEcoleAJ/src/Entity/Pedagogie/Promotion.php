<?php

namespace App\Entity\Pedagogie;

use App\Entity\Etablissement\Pole;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Etablissement\Salle;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\Professeur;
use App\Repository\Pedagogie\PromotionRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 20,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Eleve>
     */
    #[ORM\OneToMany(targetEntity: Eleve::class, mappedBy: 'promotion')]
    private Collection $eleves;



// In Promotion.php
#[ORM\OneToMany(mappedBy: 'promotion', targetEntity: Programme::class)]
private Collection $programmes;

/**
 * @var Collection<int, Cours>
 */
#[ORM\ManyToMany(targetEntity: Cours::class, mappedBy: 'promotion')]
private Collection $cours;

/**
 * @var Collection<int, Exercice>
 */
#[ORM\OneToMany(targetEntity: Exercice::class, mappedBy: 'promotion')]
private Collection $exercices;



/**
 * @var Collection<int, Salle>
 */
#[ORM\ManyToMany(targetEntity: Salle::class, mappedBy: 'promotion')]
private Collection $salles;

#[ORM\OneToOne(mappedBy: 'promoPrincipale', cascade: ['persist', 'remove'])]
private ?Salle $SallePrincipale = null;

#[ORM\ManyToOne(inversedBy: 'promotions')]
#[ORM\JoinColumn(nullable: false)]
private ?Pole $pole = null;


public function getProgrammes(): Collection
{
    return $this->programmes;
}
    


    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->programmes = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->exercices = new ArrayCollection();
        $this->salles = new ArrayCollection();
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
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): static
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setPromotion($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): static
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getPromotion() === $this) {
                $elefe->setPromotion(null);
            }
        }

        return $this;
    }

 
    public function addProgramme(Programme $programme): static
    {
        if (!$this->programmes->contains($programme)) {
            $this->programmes->add($programme);
            $programme->setMatiere($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): static
    {
        if ($this->programmes->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getMatiere() === $this) {
                $programme->setMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->addPromotion($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            $cour->removePromotion($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Exercice>
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }

    public function addExercice(Exercice $exercice): static
    {
        if (!$this->exercices->contains($exercice)) {
            $this->exercices->add($exercice);
            $exercice->setPromotion($this);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): static
    {
        if ($this->exercices->removeElement($exercice)) {
            // set the owning side to null (unless already changed)
            if ($exercice->getPromotion() === $this) {
                $exercice->setPromotion(null);
            }
        }

        return $this;
    }

   

    /**
     * @return Collection<int, Salle>
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): static
    {
        if (!$this->salles->contains($salle)) {
            $this->salles->add($salle);
            $salle->addPromotion($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): static
    {
        if ($this->salles->removeElement($salle)) {
            $salle->removePromotion($this);
        }

        return $this;
    }

    public function getSallePrincipale(): ?Salle
    {
        return $this->SallePrincipale;
    }

    public function setSallePrincipale(?Salle $SallePrincipale): static
    {
        // unset the owning side of the relation if necessary
        if ($SallePrincipale === null && $this->SallePrincipale !== null) {
            $this->SallePrincipale->setPromoPrincipale(null);
        }

        // set the owning side of the relation if necessary
        if ($SallePrincipale !== null && $SallePrincipale->getPromoPrincipale() !== $this) {
            $SallePrincipale->setPromoPrincipale($this);
        }

        $this->SallePrincipale = $SallePrincipale;

        return $this;
    }

    public function getPole(): ?Pole
    {
        return $this->pole;
    }

    public function setPole(?Pole $pole): static
    {
        $this->pole = $pole;

        return $this;
    }

}
