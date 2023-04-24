<?php

namespace App\Entity;

use App\Repository\TimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeRepository::class)]
class Time
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $day = null;

    #[ORM\Column(length: 5)]
    private ?string $AmOpen = null;

    #[ORM\Column(length: 5)]
    private ?string $AmClose = null;

    #[ORM\Column(length: 5)]
    private ?string $PmOpen = null;

    #[ORM\Column(length: 5)]
    private ?string $PmClose = null;

    #[ORM\ManyToOne(inversedBy: 'times')]
    #[ORM\JoinColumn(nullable: false)]
    private ?restaurant $restaurant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getRestaurant(): ?restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getAmOpen(): ?string
    {
        return $this->AmOpen;
    }

    public function setAmOpen(?string $AmOpen): self
    {
        $this->AmOpen = $AmOpen;

        return $this;
    }

    public function getAmClose(): ?string
    {
        return $this->AmClose;
    }

    public function setAmClose(?string $AmClose): self
    {
        $this->AmClose = $AmClose;

        return $this;
    }

    public function getPmOpen(): ?string
    {
        return $this->PmOpen;
    }

    public function setPmOpen(?string $PmOpen): self
    {
        $this->PmOpen = $PmOpen;

        return $this;
    }

    public function getPmClose(): ?string
    {
        return $this->PmClose;
    }

    public function setPmClose(?string $PmClose): self
    {
        $this->PmClose = $PmClose;

        return $this;
    }
}
