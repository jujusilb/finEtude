<?php

namespace App\Entity\Utilisateur;

use App\Entity\Pedagogie\Cours;
use App\Entity\Pedagogie\Exercice;
use App\Entity\Pedagogie\Note;
use App\Entity\Pedagogie\Promotion;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Entity\Pedagogie\Programme;
use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\ProfesseurRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
#[Vich\Uploadable]
class Professeur extends Personnel{

    /**
     * @var Collection<int, ProfesseurMatiere>
     */
    #[ORM\OneToMany(targetEntity: ProfesseurMatiere::class, mappedBy: 'professeur')]
    private Collection $professeurMatiere;

    /**
     * @var Collection<int, Programme>
     */
    #[ORM\OneToMany(targetEntity: Programme::class, mappedBy: 'professeur')]
    private Collection $programmes;

    /**
     * @var Collection<int, Cours>
     */
    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'professeur')]
    private Collection $Cours;

    /**
     * @var Collection<int, Exercice>
     */
    #[ORM\OneToMany(targetEntity: Exercice::class, mappedBy: 'professeur')]
    private Collection $exercices;

    /**
     * @var Collection<int, Note>
     */
    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: Note::class)]
    private Collection $notes;

   

    

    public function __construct()
    {
        parent::__construct();
        //$this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->professeurMatiere = new ArrayCollection();
        $this->programmes = new ArrayCollection();
        $this->Cours = new ArrayCollection();
        $this->exercices = new ArrayCollection();
        $this->notes = new ArrayCollection();
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
            $professeurMatiere->setProfesseur($this);
        }

        return $this;
    }

    public function removeProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if ($this->professeurMatiere->removeElement($professeurMatiere)) {
            // set the owning side to null (unless already changed)
            if ($professeurMatiere->getProfesseur() === $this) {
                $professeurMatiere->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Programme>
     */
    public function getProgrammes(): Collection
    {
        return $this->programmes;
    }

    public function addProgrammes(Programme $programme): static
    {
        if (!$this->programmes->contains($programme)) {
            $this->programmes->add($programme);
            $programme->setProfesseur($this);
        }

        return $this;
    }

    public function removeProgrammes(Programme $programme): static
    {
        if ($this->programmes->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getProfesseur() === $this) {
                $programme->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->Cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->Cours->contains($cour)) {
            $this->Cours->add($cour);
            $cour->setProfesseur($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->Cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getProfesseur() === $this) {
                $cour->setProfesseur(null);
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
            $exercice->setProfesseur($this);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): static
    {
        if ($this->exercices->removeElement($exercice)) {
            // set the owning side to null (unless already changed)
            if ($exercice->getProfesseur() === $this) {
                $exercice->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setRelation($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getRelation() === $this) {
                $note->setRelation(null);
            }
        }

        return $this;
    }

  
}
