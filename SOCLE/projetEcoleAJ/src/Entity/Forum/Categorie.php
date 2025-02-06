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
    private Collection $subForum;

    public function __construct()
    {
        $this->subForum = new ArrayCollection();
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
    public function getSubForum(): Collection
    {
        return $this->subForum;
    }

    public function addSubForum(SubForum $subForum): static
    {
        if (!$this->subForum->contains($subForum)) {
            $this->subForum->add($subForum);
            $subForum->setCategorie($this);
        }

        return $this;
    }

    public function removeSubForum(SubForum $subForum): static
    {
        if ($this->subForum->removeElement($subForum)) {
            // set the owning side to null (unless already changed)
            if ($subForum->getCategorie() === $this) {
                $subForum->setCategorie(null);
            }
        }

        return $this;
    }
}
