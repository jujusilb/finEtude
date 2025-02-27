<?php

namespace App\Entity\Cantine;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\Cantine\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


   

    #[ORM\ManyToOne(inversedBy: 'menus')]
    private ?Plat $plat = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    private ?Fromage $fromage = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    private ?Dessert $dessert = null;

    /**
     * @var Collection<int, Repas>
     */
    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'menu')]
    private Collection $repas;

    #[ORM\ManyToOne(inversedBy: 'menusb')]
    private ?Entree $entree = null;

    public function __construct()
    {
        $this->repas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getPlat(): ?Plat
    {
        return $this->plat;
    }

    public function setPlat(?Plat $plat): static
    {
        $this->plat = $plat;

        return $this;
    }

    public function getFromage(): ?Fromage
    {
        return $this->fromage;
    }

    public function setFromage(?Fromage $fromage): static
    {
        $this->fromage = $fromage;

        return $this;
    }

    public function getDessert(): ?Dessert
    {
        return $this->dessert;
    }

    public function setDessert(?Dessert $dessert): static
    {
        $this->dessert = $dessert;

        return $this;
    }

    /**
     * @return Collection<int, Repas>
     */
    public function getRepas(): Collection
    {
        return $this->repas;
    }

    public function addRepa(Repas $repa): static
    {
        if (!$this->repas->contains($repa)) {
            $this->repas->add($repa);
            $repa->setMenu($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): static
    {
        if ($this->repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getMenu() === $this) {
                $repa->setMenu(null);
            }
        }

        return $this;
    }

    public function getEntree(): ?Entree
    {
        return $this->entree;
    }

    public function setEntree(?Entree $entree): static
    {
        $this->entree = $entree;

        return $this;
    }
}
