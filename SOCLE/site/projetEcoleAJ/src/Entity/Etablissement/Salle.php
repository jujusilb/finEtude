<?php

namespace App\Entity\Etablissement;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Pedagogie\Promotion;
use App\Repository\Etablissement\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 50,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'salles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etage $etage = null;

    /**
     * @var Collection<int, Promotion>
     */
    #[ORM\ManyToMany(targetEntity: Promotion::class, inversedBy: 'salles')]
    private Collection $promotion;

    #[ORM\OneToOne(inversedBy: 'SallePrincipale')]
    #[ORM\JoinColumn(nullable: true)] // Permet à SallePrincipale d'être null
    private ?Promotion $promoPrincipale = null;

    public function __construct()
    {
        $this->promotion = new ArrayCollection();
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

    public function getEtage(): ?Etage
    {
        return $this->etage;
    }

    public function setEtage(?Etage $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): static
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion->add($promotion);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): static
    {
        $this->promotion->removeElement($promotion);

        return $this;
    }

    public function getPromoPrincipale(): ?Promotion
    {
        return $this->promoPrincipale;
    }

    public function setPromoPrincipale(Promotion $promoPrincipale): static
    {
        // set the owning side of the relation if necessary
        if ($promoPrincipale->getSallePrincipale() !== $this) {
            $promoPrincipale->setSallePrincipale($this);
        }

        $this->promoPrincipale = $promoPrincipale;

        return $this;
    }
}
