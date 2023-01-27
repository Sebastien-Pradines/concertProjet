<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: tags::class, inversedBy: 'bands', cascade: ['persist', 'remove'])]
    private Collection $bandTags;

    #[ORM\OneToMany(mappedBy: 'band', targetEntity: concert::class)]
    private Collection $concerts;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'favorites', cascade: ['persist', 'remove'])]
    private Collection $followers;

    #[ORM\OneToMany(mappedBy: 'band', targetEntity: member::class)]
    private Collection $members;

    public function __construct()
    {
        $this->bandTags = new ArrayCollection();
        $this->concerts = new ArrayCollection();
        $this->followers = new ArrayCollection();
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, tags>
     */
    public function getBandTags(): Collection
    {
        return $this->bandTags;
    }

    public function addBandTag(tags $bandTag): self
    {
        if (!$this->bandTags->contains($bandTag)) {
            $this->bandTags->add($bandTag);
        }

        return $this;
    }

    public function removeBandTag(tags $bandTag): self
    {
        $this->bandTags->removeElement($bandTag);

        return $this;
    }

    /**
     * @return Collection<int, concert>
     */
    public function getConcerts(): Collection
    {
        return $this->concerts;
    }

    public function addConcert(concert $concert): self
    {
        if (!$this->concerts->contains($concert)) {
            $this->concerts->add($concert);
            $concert->setBand($this);
        }

        return $this;
    }

    public function removeConcert(concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getBand() === $this) {
                $concert->setBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    public function addFollower(User $follower): self
    {
        if (!$this->followers->contains($follower)) {
            $this->followers->add($follower);
            $follower->addFavorite($this);
        }

        return $this;
    }

    public function removeFollower(User $follower): self
    {
        if ($this->followers->removeElement($follower)) {
            $follower->removeFavorite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, member>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members->add($member);
            $member->setBand($this);
        }

        return $this;
    }

    public function removeMember(member $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getBand() === $this) {
                $member->setBand(null);
            }
        }

        return $this;
    }
}
