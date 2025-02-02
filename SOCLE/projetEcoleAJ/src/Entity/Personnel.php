<?php

namespace App\Entity;

use App\Entity\Adulte;
use App\Entity\Cuisine;
use App\Entity\Direction;
use App\Entity\Documentaliste;
use App\Entity\Professeur;
use App\Entity\Secretariat;
use App\Entity\Surveillant;
use App\Repository\PersonnelRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]

#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "Personnel" => Personnel::class, 
    "cuisine" => Cuisine::class,
    'direction' => Direction::class,
    "documentaliste" => Documentaliste::class, 
    "Professeur"=>Professeur::class, 
    "secretariat" => Secretariat::class,
    'surveillant' => Surveillant::class
    ])]

class Personnel extends Adulte{
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_embauche = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

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
}
