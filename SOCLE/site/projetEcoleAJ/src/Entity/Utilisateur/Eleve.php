<?php

namespace App\Entity\Utilisateur;

use App\Entity\Pedagogie\Note;
use App\Entity\Pedagogie\Promotion;
use App\Entity\Professionnel\Stage;
use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve extends Membre
{
    



    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotion $promotion = null;

    /**
     * @var Collection<int, ParentEleve>
     */
    #[ORM\ManyToMany(targetEntity: ParentEleve::class, mappedBy: 'eleve')]
    private Collection $parentEleves;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'stagiaire')]
    private Collection $stages;

    /**
     * @var Collection<int, Note>
     */
    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: Note::class)]
    private Collection $notes;

    #[ORM\Column(length: 50)]
    private ?string $pension = null;



    

        public function __construct()
    {
        parent::__construct();
        $this->parentEleves = new ArrayCollection();
        $this->stages = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }



    public function getPromotion(): ?Promotion{
        return $this->promotion;
    }
    public function setPromotion(?Promotion $promotion): static{
        $this->promotion = $promotion;
        return $this;
    }

    /**
     * @return Collection<int, ParentEleve>
     */
    public function getParentEleves(): Collection
    {
        return $this->parentEleves;
    }

    public function addParentEleve(ParentEleve $parentEleves): static
    {
        if (!$this->parentEleves->contains($parentEleves)) {
            $this->parentEleves->add($parentEleves);
            $parentEleves->addEleve($this);
        }

        return $this;
    }

    public function removeParentEleves(ParentEleve $parentEleves): static
    {
        if ($this->parentEleves->removeElement($parentEleves)) {
            $parentEleves->removeEleves($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStages(Stage $stages): static
    {
        if (!$this->stages->contains($stages)) {
            $this->stages->add($stages);
            $stages->setStagiaire($this);
        }

        return $this;
    }

    public function removeStages(Stage $stages): static
    {
        if ($this->stages->removeElement($stages)) {
            // set the owning side to null (unless already changed)
            if ($stages->getStagiaire() === $this) {
                $stages->setStagiaire(null);
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
            $note->setEleve($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEleve() === $this) {
                $note->setEleve(null);
            }
        }

        return $this;
    }

    public function getPension(): ?string
    {
        return $this->pension;
    }

    public function setPension(string $pension): static
    {
        $this->pension = $pension;

        return $this;
    }

 
}
