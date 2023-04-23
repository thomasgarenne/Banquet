<?php

namespace App\Entity;

use App\Repository\TimeRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $AmOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $AmClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $PmOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $PmClose = null;

    #[ORM\ManyToOne(inversedBy: 'times')]
    #[ORM\JoinColumn(nullable: false)]
    private ?restaurant $relation = null;

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

    public function getAmOpen(): ?\DateTimeInterface
    {
        return $this->AmOpen;
    }

    public function setAmOpen(\DateTimeInterface $AmOpen): self
    {
        $this->AmOpen = $AmOpen;

        return $this;
    }

    public function getAmClose(): ?\DateTimeInterface
    {
        return $this->AmClose;
    }

    public function setAmClose(\DateTimeInterface $AmClose): self
    {
        $this->AmClose = $AmClose;

        return $this;
    }

    public function getPmOpen(): ?\DateTimeInterface
    {
        return $this->PmOpen;
    }

    public function setPmOpen(\DateTimeInterface $PmOpen): self
    {
        $this->PmOpen = $PmOpen;

        return $this;
    }

    public function getPmClose(): ?\DateTimeInterface
    {
        return $this->PmClose;
    }

    public function setPmClose(\DateTimeInterface $PmClose): self
    {
        $this->PmClose = $PmClose;

        return $this;
    }

    public function getRelation(): ?restaurant
    {
        return $this->relation;
    }

    public function setRelation(?restaurant $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
