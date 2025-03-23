<?php

namespace App\Entity\Forum;

use App\Repository\Forum\ForumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForumRepository::class)]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 10,
        max: 50,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, CategorieForum>
     */
    #[ORM\OneToMany(targetEntity: CategorieForum::class, mappedBy: 'forum')]
    private Collection $categorieForums;
     
    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private ?array $role = null;

    public function __construct()
    {
        $this->categorieForums = new ArrayCollection();
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

    /**
     * @return Collection<int, CategorieForum>
     */
    public function getCategorieForums(): Collection
    {
        return $this->categorieForums;
    }

    public function addCategory(CategorieForum $category): static
    {
        if (!$this->categorieForums->contains($category)) {
            $this->categorieForums->add($category);
            $category->setForum($this);
        }

        return $this;
    }

    public function removeCategory(CategorieForum $category): static
    {
        if ($this->categorieForums->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getForum() === $this) {
                $category->setForum(null);
            }
        }

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): static
    {
        $this->role = $role;

        return $this;
    }
}
