<?php

namespace App\Entity\Pedagogie;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Utilisateur\Membre;
use App\Repository\Pedagogie\MatiereRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
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
     * @var Collection<int, ProfesseurMatiere>
     */
    #[ORM\OneToMany(targetEntity: ProfesseurMatiere::class, mappedBy: 'matiere')]
    private Collection $professeurMatiere;

    /**
     * @var Collection<int, Programme>
     */
    #[ORM\OneToMany(targetEntity: Programme::class, mappedBy: 'matiere')]
    private Collection $programme;

    /**
     * @var Collection<int, Cours>
     */
    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'matiere')]
    private Collection $cours;

    /**
     * @var Collection<int, Exercice>
     */
    #[ORM\OneToMany(targetEntity: Exercice::class, mappedBy: 'matiere')]
    private Collection $exercices;

    public function __construct()
    {
        $this->professeurMatiere = new ArrayCollection();
        $this->programme = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->exercices = new ArrayCollection();
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function getLibelle(): ?string{
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;
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
            $professeurMatiere->setMatiere($this);
        }

        return $this;
    }

    public function removeProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if ($this->professeurMatiere->removeElement($professeurMatiere)) {
            // set the owning side to null (unless already changed)
            if ($professeurMatiere->getMatiere() === $this) {
                $professeurMatiere->setMatiere(null);
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
            $programme->setMatiere($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): static
    {
        if ($this->programme->removeElement($programme)) {
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
            $cour->setMatiere($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getMatiere() === $this) {
                $cour->setMatiere(null);
            }
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
            $exercice->setMatiere($this);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): static
    {
        if ($this->exercices->removeElement($exercice)) {
            // set the owning side to null (unless already changed)
            if ($exercice->getMatiere() === $this) {
                $exercice->setMatiere(null);
            }
        }

        return $this;
    }

    
    }
