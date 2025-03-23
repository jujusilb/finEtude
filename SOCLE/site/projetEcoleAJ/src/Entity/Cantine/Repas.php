<?php

namespace App\Entity\Cantine;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Cantine\ReservationRepas;
use App\Entity\Utilisateur\Membre;

use App\Repository\Cantine\RepasRepository;
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

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 100,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $heure = null;



    /**
     * @var Collection<int, ReservationRepas>
     */
    #[ORM\OneToMany(targetEntity: ReservationRepas::class, mappedBy: 'repas')]
    private Collection $reservationRepas;


    public function __construct()
    {
        $this->reservationRepas = new ArrayCollection();
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
     * @return Collection<int, ReservationRepas>
     */
    public function getReservationRepas(): Collection
    {
        return $this->reservationRepas;
    }

    public function addReservationRepa(ReservationRepas $reservationRepa): static
    {
        if (!$this->reservationRepas->contains($reservationRepa)) {
            $this->reservationRepas->add($reservationRepa);
            $reservationRepa->setRepas($this);
        }

        return $this;
    }

    public function removeReservationRepa(ReservationRepas $reservationRepa): static
    {
        if ($this->reservationRepas->removeElement($reservationRepa)) {
            // set the owning side to null (unless already changed)
            if ($reservationRepa->getRepas() === $this) {
                $reservationRepa->setRepas(null);
            }
        }

        return $this;
    }


}


