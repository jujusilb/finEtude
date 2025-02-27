<?php

namespace App\Entity\Utilisateur;

use App\Entity\Boutique\Commande;
use App\Entity\Boutique\membreEvent;
use App\Entity\Cantine\PlanningRepas;
use App\Entity\Etablissement\Boutique;
use App\Entity\Utilisateur\User;
use App\Entity\Utilisateur\Admin;
use App\Entity\Utilisateur\Adulte;
use App\Entity\Utilisateur\Cuisine;
use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Documentaliste;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\Insertion;
use App\Entity\Utilisateur\ParentEleve;
use App\Entity\Utilisateur\Professeur;
use App\Entity\CDI\Emprunt;
use App\Entity\Cantine\Repas;
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
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
#[Vich\Uploadable]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([   
    "membre" => Membre::class, 
        "admin" => Admin::class, 
        "eleve" => Eleve::class,
        "adulte" =>Adulte::class,
            "parentEleve" =>ParentEleve::class,
            "personnel" => Personnel::class,
                "cuisine" => Cuisine::class,
                "documentaliste" => Documentaliste::class,
                "surveillant" =>Surveillant::class,
                "professeur" => Professeur::class,
                'insertion' =>Insertion::class,
                "secretariat" => Secretariat::class,
                    "direction" =>Direction::class,
])]
class Membre extends User
{
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;


 

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
    private ?string $username = null;



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
    private bool $charte;

    /**
     * @var Collection<int, PlanningRepas>
     */
    #[ORM\OneToMany(targetEntity: PlanningRepas::class, mappedBy: 'membre')]
    private Collection $planningRepas;

    /**
     * @var Collection<int, Emprunt>
     */
    #[ORM\OneToMany(targetEntity: Emprunt::class, mappedBy: 'membre')]
    private Collection $emprunts;

    #[ORM\Column]
    #[Assert\GreaterThanOrEqual(value: 0, message: "Le nombre de jetons ne peut pas être négatif.")]
    private ?int $jetonRepas = null;

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'membre')]
    private Collection $commandes;


    /**
     * @var Collection<int, membreEvent>
     */
    #[ORM\OneToMany(targetEntity: membreEvent::class, mappedBy: 'membre')]
    private Collection $membreEvents;




    
    public function __construct(){
        $this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->repas = new ArrayCollection();
        $this->threads = new ArrayCollection();
        $this->senderMess = new ArrayCollection();
        $this->receiverMess = new ArrayCollection();
        $this->planningRepas = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->membreEvents = new ArrayCollection();
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


    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
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
            $planningRepa->setMembre($this);
        }

        return $this;
    }

    public function removePlanningRepa(PlanningRepas $planningRepa): static
    {
        if ($this->planningRepas->removeElement($planningRepa)) {
            // set the owning side to null (unless already changed)
            if ($planningRepa->getMembre() === $this) {
                $planningRepa->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): static
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts->add($emprunt);
            $emprunt->setMembre($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): static
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getMembre() === $this) {
                $emprunt->setMembre(null);
            }
        }

        return $this;
    }

    public function getJetonRepas(): ?int
    {
        return $this->jetonRepas;
    }

    public function setJetonRepas(int $jetonRepas): static
    {
        $this->jetonRepas = $jetonRepas;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setMembre($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getMembre() === $this) {
                $commande->setMembre(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection<int, membreEvent>
     */
    public function getMembreEvents(): Collection
    {
        return $this->membreEvents;
    }

    public function addMembreEvent(membreEvent $membreEvent): static
    {
        if (!$this->membreEvents->contains($membreEvent)) {
            $this->membreEvents->add($membreEvent);
            $membreEvent->setMembre($this);
        }

        return $this;
    }

    public function removeMembreEvent(membreEvent $membreEvent): static
    {
        if ($this->membreEvents->removeElement($membreEvent)) {
            // set the owning side to null (unless already changed)
            if ($membreEvent->getMembre() === $this) {
                $membreEvent->setMembre(null);
            }
        }

        return $this;
    }



    
    
}
