<?php

namespace App\Entity;

use App\Entity\Adminer;
use App\Entity\Adulte;
use App\Entity\Cuisine;
use App\Entity\Direction;
use App\Entity\Documentaliste;
use App\Entity\Eleve;
use App\Entity\ParentEleve;
use App\Entity\Professeur;
use App\Entity\Referent;
use App\Entity\Secretariat;
use App\Entity\Surveillant;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
#[Vich\Uploadable]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([    
    "membre" => Membre::class, 
    "admin" => Admin::class, 
    "adulte" =>Adulte::class,
    "cuisine" => Cuisine::class,
    'direction' =>Direction::class,
    "documentaliste" => Documentaliste::class,
    "eleve" => Eleve::class,
    "parentEleve" =>ParentEleve::class,
    "professeur" => Professeur::class,
    "referent" => Referent::class,
    "secretariat" => Secretariat::class,
    "surveillant" =>Surveillant::class
    ])]
class Membre {


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;


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

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'Membre')]
    private Collection $message;

    /**
     * @var Collection<int, Repas>
     */
    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'membreb')]
    private Collection $repas;

    public function __construct(){
        $this->emprunt = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->message= new ArrayCollection();
        $this->repas = new ArrayCollection();
    }
    public function getId(): ?int{
        return $this->id;
    }

    

    public function getNom(): ?string{
        return $this->nom;
    }
    public function setNom(string $nom): static{
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string{
        return $this->prenom;
    }
    public function setPrenom(string $prenom): static{
        $this->prenom = $prenom;
        return $this;
    }

    public function setUpdatedAt($updatedAt): static{
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunt(): Collection{
        return $this->emprunt;
    }
    public function addEmprunt(Emprunt $emprunt): static{
        if (!$this->emprunt->contains($emprunt)) {
            $this->emprunt->add($emprunt);
            $emprunt->setMembre($this);
        }
        return $this;
    }
    public function removeEmprunt(Emprunt $emprunt): static{
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
    public function setImageFile(?File $imageFile = null): void {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        } else {
            if ($this->createdAt === null) {
                $this->createdAt = new \DateTimeImmutable();  // Ensure createdAt is set
            }
        }
    }
        
    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
        return $this;
    }
    public function getImageFile(): ?File{
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void{
        $this->imageName = $imageName;
    }
    public function getImageName(): ?string{
        return $this->imageName;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->message->contains($message)) {
            $this->message->add($message);
            $message->setMembre($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->message->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getMembre() === $this) {
                $message->setMembre(null);
            }
        }

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
            $repa->setMembreb($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): static
    {
        if ($this->repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getMembreb() === $this) {
                $repa->setMembreb(null);
            }
        }

        return $this;
    }
}
