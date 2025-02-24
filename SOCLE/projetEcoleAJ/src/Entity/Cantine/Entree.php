<?php

namespace App\Entity\Cantine;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\Cantine\EntreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreeRepository::class)]
class Entree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: false)]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 100,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Menu>
     */
    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'entree')]
    private Collection $menus;

    /**
     * @var Collection<int, Menu>
     */
    #[ORM\OneToMany(targetEntity: Menu::class, mappedBy: 'entree')]
    private Collection $menusb;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->menusb = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): static
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->addEntree($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): static
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeEntree($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenusb(): Collection
    {
        return $this->menusb;
    }

    public function addMenusb(Menu $menusb): static
    {
        if (!$this->menusb->contains($menusb)) {
            $this->menusb->add($menusb);
            $menusb->setEntree($this);
        }

        return $this;
    }

    public function removeMenusb(Menu $menusb): static
    {
        if ($this->menusb->removeElement($menusb)) {
            // set the owning side to null (unless already changed)
            if ($menusb->getEntree() === $this) {
                $menusb->setEntree(null);
            }
        }

        return $this;
    }
}
