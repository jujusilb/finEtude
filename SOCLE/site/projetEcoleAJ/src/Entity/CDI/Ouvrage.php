<?php

namespace App\Entity\CDI;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\CDI\OuvrageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvrageRepository::class)]
class Ouvrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 255,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $titre = null;

    /**
     * @var Collection<int, Emprunt>
     */
    #[ORM\OneToMany(targetEntity: Emprunt::class, mappedBy: 'ouvrage')]
    private Collection $emprunts;

    /**
     * @var Collection<int, CategorieOuvrage>
     */
    #[ORM\ManyToMany(targetEntity: CategorieOuvrage::class, inversedBy: 'Ouvrages')]
    private Collection $categorieOuvrages;

    #[ORM\ManyToOne(inversedBy: 'ouvrages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StatutOuvrage $statutOuvrage = null;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
        $this->categorieOuvrages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): static
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts->add($emprunt);
            $emprunt->setOuvrage($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): static
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getOuvrage() === $this) {
                $emprunt->setOuvrage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieOuvrage>
     */
    public function getCategorieOuvrages(): Collection
    {
        return $this->categorieOuvrages;
    }

    public function addCategorieOuvrages(CategorieOuvrage $categorieOuvrages): static
    {
        if (!$this->categorieOuvrages->contains($categorieOuvrages)) {
            $this->categorieOuvrages->add($categorieOuvrages);
        }

        return $this;
    }

    public function removeCategorieOuvrages(CategorieOuvrage $categorieOuvrages): static
    {
        $this->categorieOuvrages->removeElement($categorieOuvrages);

        return $this;
    }

    public function getStatutOuvrage(): ?StatutOuvrage
    {
        return $this->statutOuvrage;
    }

    public function setStatutOuvrage(?StatutOuvrage $statutOuvrage): static
    {
        $this->statutOuvrage = $statutOuvrage;

        return $this;
    }
}
