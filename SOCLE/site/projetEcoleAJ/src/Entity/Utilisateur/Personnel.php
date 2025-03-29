<?php

namespace App\Entity\Utilisateur;

use App\Entity\Etablissement\Pole;
use App\Entity\Utilisateur\User;
use App\Entity\Utilisateur\Adulte;
use App\Entity\Utilisateur\Cuisine;
use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Documentaliste;
use App\Entity\Utilisateur\Insertion;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Utilisateur\Secretariat;
use App\Entity\Utilisateur\Surveillant;
use App\Repository\Utilisateur\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]

#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "personnel" => Personnel::class, 
        "cuisine" => Cuisine::class,
        "documentaliste" => Documentaliste::class, 
        "professeur"=>Professeur::class, 
        "secretariat" => Secretariat::class,
            'direction' => Direction::class,
        'surveillant' => Surveillant::class,
        'insertion' => Insertion::class
    ])]

class Personnel extends Adulte{
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_embauche = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    /**
     * @var Collection<int, Pole>
     */
    #[ORM\ManyToMany(targetEntity: Pole::class, inversedBy: 'personnels')]
    private Collection $poles;

    public function __construct()
    {
        parent::__construct();
        $this->poles = new ArrayCollection();
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }
    public function setDateEmbauche(\DateTimeInterface $date_embauche): static
    {
        $this->date_embauche = $date_embauche;
        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }
    public function setPoste(string $poste): static
    {
        $this->poste = $poste;
        return $this;
    }

    /**
     * @return Collection<int, Pole>
     */
    public function getPoles(): Collection
    {
        return $this->poles;
    }

    public function addPoles(Pole $pole): static
    {
        if (!$this->poles->contains($pole)) {
            $this->poles->add($pole);
        }

        return $this;
    }

    public function removePoles(Pole $pole): static
    {
        $this->poles->removeElement($pole);

        return $this;
    }
}
