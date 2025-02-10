<?php

namespace App\Entity\Forum;

use App\Repository\Forum\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    private ?Forum $forum = null;

    /**
     * @var Collection<int, SubForum>
     */
    #[ORM\OneToMany(targetEntity: SubForum::class, mappedBy: 'categorie')]
    private Collection $subForums;

    public function __construct()
    {
        $this->subForums = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getForum(): ?Forum
    {
        return $this->forum;
    }

    public function setForum(?Forum $forum): static
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * @return Collection<int, SubForum>
     */
    public function getSubForums(): Collection
    {
        return $this->subForums;
    }

    public function addSubForums(SubForum $subForums): static
    {
        if (!$this->subForums->contains($subForums)) {
            $this->subForums->add($subForums);
            $subForums->setCategorie($this);
        }

        return $this;
    }

    public function removeSubForums(SubForum $subForums): static
    {
        if ($this->subForums->removeElement($subForums)) {
            // set the owning side to null (unless already changed)
            if ($subForums->getCategorie() === $this) {
                $subForums->setCategorie(null);
            }
        }

        return $this;
    }
}
