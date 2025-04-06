<?php

namespace App\Entity\Pedagogie;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Utilisateur\Professeur;
use App\Repository\Pedagogie\CoursRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 100,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'Cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Professeur $professeur = null;



    #[ORM\Column]
    private ?string $fichier = null;

    private ?File $file = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matiere $matiere = null;

    /**
     * @var Collection<int, Promotion>
     */
    #[ORM\ManyToMany(targetEntity: Promotion::class, inversedBy: 'cours')]
    private Collection $promotions;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
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

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): static
    {
        $this->professeur = $professeur;

        return $this;
    }


    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): static
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file = null): void
    {
        $this->file = $file;

        if (null !== $file) {
            // Mettre à jour le chemin du fichier chaque fois qu'un fichier est téléchargé
            $this->fichier = $file->getFilename();
        }
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): static
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotions(): Collection {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): static {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions->add($promotion);
        }
        return $this;
    }

    public function removePromotion(Promotion $promotion): static
    {
        $this->promotions->removeElement($promotion);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
