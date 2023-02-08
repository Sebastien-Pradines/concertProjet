<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'concerts')]
    private ?Band $band = null;

    #[ORM\OneToMany(mappedBy: 'concert', targetEntity: Comment::class)]
    private Collection $comments;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'concerts')]
    private ?Stage $stage = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\OneToMany(mappedBy: 'concert', targetEntity: Reservation::class)]
    private Collection $user;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBand(): ?Band
    {
        return $this->band;
    }

    public function setBand(?Band $band): self
    {
        $this->band = $band;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setConcert($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getConcert() === $this) {
                $comment->setConcert(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStage(): ?stage
    {
        return $this->stage;
    }

    public function setStage(?stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Reservation $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setConcert($this);
        }

        return $this;
    }

    public function removeUser(Reservation $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getConcert() === $this) {
                $user->setConcert(null);
            }
        }

        return $this;
    }
}
