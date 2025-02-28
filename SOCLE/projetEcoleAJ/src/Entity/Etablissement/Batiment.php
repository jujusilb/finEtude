<?php

namespace App\Entity\Etablissement;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\Etablissement\BatimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentRepository::class)]
class Batiment
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

    /**
     * @var Collection<int, Etage>
     */
    #[ORM\OneToMany(targetEntity: Etage::class, mappedBy: 'batiment')]
    private Collection $etages;

    public function __construct()
    {
        $this->etages = new ArrayCollection();
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
     * @return Collection<int, Etage>
     */
    public function getEtages(): Collection
    {
        return $this->etages;
    }

    public function addEtage(Etage $etage): static
    {
        if (!$this->etages->contains($etage)) {
            $this->etages->add($etage);
            $etage->setBatiment($this);
        }

        return $this;
    }

    public function removeEtage(Etage $etage): static
    {
        if ($this->etages->removeElement($etage)) {
            // set the owning side to null (unless already changed)
            if ($etage->getBatiment() === $this) {
                $etage->setBatiment(null);
            }
        }

        return $this;
    }
}
