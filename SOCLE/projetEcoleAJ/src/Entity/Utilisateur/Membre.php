<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Adminer;
use App\Entity\Utilisateur\Adulte;
use App\Entity\Utilisateur\Cuisine;
use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Documentaliste;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\ParentEleve;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\Referent;
use App\Entity\Documentaliste\Emprunt;
use App\Entity\Cuisine\Repas;
use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Entity\Utilisateur\Secretariat;
use App\Entity\Utilisateur\Surveillant;

use App\Repository\Utilisateur\MembreRepository;
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
class Membre implements UserInterface, PasswordAuthenticatedUserInterface{


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
     * @var Collection<int, Repas>
     */
    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'membreb')]
    private Collection $repas;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;



    #[ORM\Column(type: 'json')]
    private array $roles = ['ROLE_USER'];


    /**
     * @var Collection<int, Thread>
     */
    #[ORM\OneToMany(targetEntity: Thread::class, mappedBy: 'createur')]
    private Collection $threads;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'expediteur')]
    private Collection $senderMess;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'destinataire')]
    private Collection $receiverMess;

    #[ORM\Column(nullable: true)]
    private bool $charte; // Valeur par défaut

    
    public function __construct(){
        $this->emprunt = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->repas = new ArrayCollection();
        $this->threads = new ArrayCollection();
        $this->senderMess = new ArrayCollection();
        $this->receiverMess = new ArrayCollection();
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
            $repa->setMembre($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): static
    {
        if ($this->repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getMembre() === $this) {
                $repa->setMembre(null);
            }
        }

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function eraseCredentials(){
        
    }
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    /**
     * @return Collection<int, Thread>
     */
    public function getThreads(): Collection
    {
        return $this->threads;
    }

    public function addThread(Thread $thread): static
    {
        if (!$this->threads->contains($thread)) {
            $this->threads->add($thread);
            $thread->setCreateur($this);
        }

        return $this;
    }

    public function removeThread(Thread $thread): static
    {
        if ($this->threads->removeElement($thread)) {
            // set the owning side to null (unless already changed)
            if ($thread->getCreateur() === $this) {
                $thread->setCreateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getSenderMess(): Collection
    {
        return $this->senderMess;
    }

    public function addSenderMess(Message $senderMess): static
    {
        if (!$this->senderMess->contains($senderMess)) {
            $this->senderMess->add($senderMess);
            $senderMess->setExpediteur($this);
        }

        return $this;
    }

    public function removeSenderMess(Message $senderMess): static
    {
        if ($this->senderMess->removeElement($senderMess)) {
            // set the owning side to null (unless already changed)
            if ($senderMess->getExpediteur() === $this) {
                $senderMess->setExpediteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getReceiverMess(): Collection
    {
        return $this->receiverMess;
    }

    public function addReceiverMess(Message $receiverMess): static
    {
        if (!$this->receiverMess->contains($receiverMess)) {
            $this->receiverMess->add($receiverMess);
            $receiverMess->setDestinataire($this);
        }

        return $this;
    }

    public function removeReceiverMess(Message $receiverMess): static
    {
        if ($this->receiverMess->removeElement($receiverMess)) {
            // set the owning side to null (unless already changed)
            if ($receiverMess->getDestinataire() === $this) {
                $receiverMess->setDestinataire(null);
            }
        }

        return $this;
    }

    public function isCharte(): ?bool
    {
        return $this->charte;
    }

    public function setCharte(?bool $charte): static
    {
        $this->charte = $charte;

        return $this;
    }
    
    
}
