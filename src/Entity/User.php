<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     *
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="ID_from", orphanRemoval=true)
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity=Evaluate::class, mappedBy="ID_voter")
     */

    private $evaluates;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $town;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;
    /**
     * @ORM\ManyToMany(targetEntity=GameType::class, inversedBy="users")
     */
    private $interests;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, inversedBy="users")
     *
     */
    private $languages;

    public function __construct()
    {
        $this->languages = new ArrayCollection();
        $this->interests = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->evaluates = new ArrayCollection();

    }



    public function getId(): ?int
    {
        return $this->id;
    }



    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setIDFrom($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getIDFrom() === $this) {
                $message->setIDFrom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evaluate[]
     */
    public function getEvaluates(): Collection
    {
        return $this->evaluates;
    }

    public function addEvaluate(Evaluate $evaluate): self
    {
        if (!$this->evaluates->contains($evaluate)) {
            $this->evaluates[] = $evaluate;
            $evaluate->setIDVoter($this);
        }

        return $this;
    }

    public function removeEvaluate(Evaluate $evaluate): self
    {
        if ($this->evaluates->removeElement($evaluate)) {
            // set the owning side to null (unless already changed)
            if ($evaluate->getIDVoter() === $this) {
                $evaluate->setIDVoter(null);
            }
        }

        return $this;
    }
    

    /**
     * @return Collection|GameType[]
     */
    public function getInterests(): Collection
    {
        return $this->interests;
    }

    public function addInterest(GameType $interest): self
    {
        if (!$this->interests->contains($interest)) {
            $this->interests[] = $interest;
        }
    }

    public function removeInterest(GameType $interest): self
    {
        $this->interests->removeElement($interest);
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;

        }

        return $this;
    }


    public function removeLanguage(Language $language): self
    {
        $this->languages->removeElement($language);


        return $this;
    }
}
