<?php

namespace App\Entity;

use App\Repository\EvaluateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluateRepository::class)
 */
class Evaluate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $love;

    /**
     * @ORM\Column(type="integer")
     */
    private $dislike;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="evaluates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_voter;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="evaluates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_recipient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLove(): ?int
    {
        return $this->love;
    }

    public function setLove(int $love): self
    {
        $this->love = $love;

        return $this;
    }

    public function getDislike(): ?int
    {
        return $this->dislike;
    }

    public function setDislike(int $dislike): self
    {
        $this->dislike = $dislike;

        return $this;
    }

    public function getIDVoter(): ?User
    {
        return $this->ID_voter;
    }

    public function setIDVoter(?User $ID_voter): self
    {
        $this->ID_voter = $ID_voter;

        return $this;
    }

    public function getIDRecipient(): ?User
    {
        return $this->ID_recipient;
    }

    public function setIDRecipient(?User $ID_recipient): self
    {
        $this->ID_recipient = $ID_recipient;

        return $this;
    }
}
