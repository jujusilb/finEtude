<?php

namespace App\Entity;
use App\Repository\MatiereRepository;
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

    #[ORM\Column(length: 255)]
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

    public function __construct()
    {
        $this->professeurMatiere = new ArrayCollection();
        $this->programme = new ArrayCollection();
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

    
    }
