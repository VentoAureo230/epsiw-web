<?php

namespace App\Entity;

use App\Repository\GoodiesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoodiesRepository::class)]
class Goodies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nbr_on_merch = null;

    #[ORM\Column]
    private ?int $cost = null;

    #[ORM\Column]
    private ?int $tva = null;

    #[ORM\Column]
    private ?bool $is_closed = null;

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

    public function getNbrOnMerch(): ?int
    {
        return $this->nbr_on_merch;
    }

    public function setNbrOnMerch(int $nbr_on_merch): self
    {
        $this->nbr_on_merch = $nbr_on_merch;

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

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function isIsClosed(): ?bool
    {
        return $this->is_closed;
    }

    public function setIsClosed(bool $is_closed): self
    {
        $this->is_closed = $is_closed;

        return $this;
    }
}
