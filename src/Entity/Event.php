<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $cost = null;

    #[ORM\Column]
    private ?bool $is_passed = null;

    #[ORM\OneToOne(inversedBy: 'bde_event', cascade: ['persist', 'remove'])]
    private ?Bde $bde_name = null;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function isIsPassed(): ?bool
    {
        return $this->is_passed;
    }

    public function setIsPassed(bool $is_passed): self
    {
        $this->is_passed = $is_passed;

        return $this;
    }

    public function getBdeName(): ?Bde
    {
        return $this->bde_name;
    }

    public function setBdeName(?Bde $bde_name): self
    {
        $this->bde_name = $bde_name;

        return $this;
    }
}
