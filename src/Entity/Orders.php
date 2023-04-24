<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dates = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $times = null;

    #[ORM\Column]
    private ?int $tables = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?USER $user = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?ordersCapacity $ordersCapacity = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function setDates(\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getTimes(): ?\DateTimeInterface
    {
        return $this->times;
    }

    public function setTimes(\DateTimeInterface $times): self
    {
        $this->times = $times;

        return $this;
    }

    public function getTables(): ?int
    {
        return $this->tables;
    }

    public function setTables(int $tables): self
    {
        $this->tables = $tables;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUser(): ?USER
    {
        return $this->user;
    }

    public function setUser(?USER $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOrdersCapacity(): ?ordersCapacity
    {
        return $this->ordersCapacity;
    }

    public function setOrdersCapacity(?ordersCapacity $ordersCapacity): self
    {
        $this->ordersCapacity = $ordersCapacity;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
