<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
#[Vich\Uploadable]
#[ORM\InheritanceType("SINGLE_TABLE")]
#[ORM\DiscriminatorColumn(name: "membre_adminer", type: "string")]
#[ORM\DiscriminatorMap(["membre" => Membre::class, "adminer" => Adminer::class])]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Emprunt>
     */
    #[ORM\OneToMany(targetEntity: Emprunt::class, mappedBy: 'membre')]
    private Collection $emprunt;

    #[Vich\UploadableField(mapping: 'membre', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;
    
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->emprunt = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunt(): Collection
    {
        return $this->emprunt;
    }

    public function addEmprunt(Emprunt $emprunt): static
    {
        if (!$this->emprunt->contains($emprunt)) {
            $this->emprunt->add($emprunt);
            $emprunt->setMembre($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): static
    {
        if ($this->emprunt->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getMembre() === $this) {
                $emprunt->setMembre(null);
            }
        }

        return $this;
    }

     /**
        * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
        * of 'UploadedFile' is injected into this setter to trigger the update. If this
        * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
        * must be able to accept an instance of 'File' as the bundle will inject one here
        * during Doctrine hydration.
        * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
        */
        public function setImageFile(?File $imageFile = null): void
        {
            $this->imageFile = $imageFile;
    
            if (null !== $imageFile) {
                // It is required that at least one field changes if you are using doctrine
                // otherwise the event listeners won't be called and the file is lost
                $this->updatedAt = new \DateTimeImmutable();
            }
            else $this->createdAt = new \DateTimeImmutable();
        }
        
        public function getCreatedAt(){
            return $this->createdAt;
        }

        public function setCreatedAt($createdAt){
            $this->createdAt = $createdAt;
            return $this;
        }

        public function getImageFile(): ?File
        {
            return $this->imageFile;
        }
    
        public function setImageName(?string $imageName): void
        {
            $this->imageName = $imageName;
        }
    
        public function getImageName(): ?string
        {
            return $this->imageName;
        }
}
