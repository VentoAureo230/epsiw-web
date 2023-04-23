<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\OneToOne(inversedBy: 'goodies_media', cascade: ['persist', 'remove'])]
    private ?Goodies $bde_name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Event $event_name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?goodies $goodies_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getBdeName(): ?Goodies
    {
        return $this->bde_name;
    }

    public function setBdeName(?Goodies $bde_name): self
    {
        $this->bde_name = $bde_name;

        return $this;
    }

    public function getEventName(): ?Event
    {
        return $this->event_name;
    }

    public function setEventName(?Event $event_name): self
    {
        $this->event_name = $event_name;

        return $this;
    }

    public function getGoodiesId(): ?goodies
    {
        return $this->goodies_id;
    }

    public function setGoodiesId(?goodies $goodies_id): self
    {
        $this->goodies_id = $goodies_id;

        return $this;
    }
}
