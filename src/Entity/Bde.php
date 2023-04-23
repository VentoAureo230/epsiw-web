<?php

namespace App\Entity;

use App\Repository\BdeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BdeRepository::class)]
class Bde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $logo_url = null;

    #[ORM\OneToOne(mappedBy: 'bde_name', cascade: ['persist', 'remove'])]
    private ?Member $bde_member = null;

    #[ORM\OneToOne(mappedBy: 'bde_name', cascade: ['persist', 'remove'])]
    private ?Event $bde_event = null;

    #[ORM\OneToOne(mappedBy: 'bde_name', cascade: ['persist', 'remove'])]
    private ?Goodies $bde_goodies = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'mail')]
    private Collection $bde_name;

    public function __construct()
    {
        $this->bde_name = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getBdeMember(): ?Member
    {
        return $this->bde_member;
    }

    public function setBdeMember(?Member $bde_member): self
    {
        // unset the owning side of the relation if necessary
        if ($bde_member === null && $this->bde_member !== null) {
            $this->bde_member->setBdeName(null);
        }

        // set the owning side of the relation if necessary
        if ($bde_member !== null && $bde_member->getBdeName() !== $this) {
            $bde_member->setBdeName($this);
        }

        $this->bde_member = $bde_member;

        return $this;
    }

    public function getBdeEvent(): ?Event
    {
        return $this->bde_event;
    }

    public function setBdeEvent(?Event $bde_event): self
    {
        // unset the owning side of the relation if necessary
        if ($bde_event === null && $this->bde_event !== null) {
            $this->bde_event->setBdeName(null);
        }

        // set the owning side of the relation if necessary
        if ($bde_event !== null && $bde_event->getBdeName() !== $this) {
            $bde_event->setBdeName($this);
        }

        $this->bde_event = $bde_event;

        return $this;
    }

    public function getBdeGoodies(): ?Goodies
    {
        return $this->bde_goodies;
    }

    public function setBdeGoodies(?Goodies $bde_goodies): self
    {
        // unset the owning side of the relation if necessary
        if ($bde_goodies === null && $this->bde_goodies !== null) {
            $this->bde_goodies->setBdeName(null);
        }

        // set the owning side of the relation if necessary
        if ($bde_goodies !== null && $bde_goodies->getBdeName() !== $this) {
            $bde_goodies->setBdeName($this);
        }

        $this->bde_goodies = $bde_goodies;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getBdeName(): Collection
    {
        return $this->bde_name;
    }

    public function addBdeName(User $bdeName): self
    {
        if (!$this->bde_name->contains($bdeName)) {
            $this->bde_name->add($bdeName);
            $bdeName->addMail($this);
        }

        return $this;
    }

    public function removeBdeName(User $bdeName): self
    {
        if ($this->bde_name->removeElement($bdeName)) {
            $bdeName->removeMail($this);
        }

        return $this;
    }
}
