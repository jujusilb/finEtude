<?php

namespace App\Entity\Cuisine;

use App\Entity\Cuisine\PlanningRepas;
use App\Entity\Utilisateur\Membre;

use App\Repository\Cuisine\RepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepasRepository::class)]
class Repas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'repas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Menu $menu = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $heure = null;



    /**
     * @var Collection<int, PlanningRepas>
     */
    #[ORM\OneToMany(targetEntity: PlanningRepas::class, mappedBy: 'repas')]
    private Collection $planningRepas;


    public function __construct()
    {
        $this->planningRepas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }



    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): static
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * @return Collection<int, PlanningRepas>
     */
    public function getPlanningRepas(): Collection
    {
        return $this->planningRepas;
    }

    public function addPlanningRepa(PlanningRepas $planningRepa): static
    {
        if (!$this->planningRepas->contains($planningRepa)) {
            $this->planningRepas->add($planningRepa);
            $planningRepa->setRepas($this);
        }

        return $this;
    }

    public function removePlanningRepa(PlanningRepas $planningRepa): static
    {
        if ($this->planningRepas->removeElement($planningRepa)) {
            // set the owning side to null (unless already changed)
            if ($planningRepa->getRepas() === $this) {
                $planningRepa->setRepas(null);
            }
        }

        return $this;
    }


}


