<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 5)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $aboutUs = null;

    #[ORM\Column(nullable: true)]
    private ?int $stars = null;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: Time::class, orphanRemoval: true)]
    private Collection $times;

    public function __construct()
    {
        $this->times = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAboutUs(): ?string
    {
        return $this->aboutUs;
    }

    public function setAboutUs(string $aboutUs): self
    {
        $this->aboutUs = $aboutUs;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(?int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * @return Collection<int, Time>
     */
    public function getTimes(): Collection
    {
        return $this->times;
    }

    public function addTime(Time $time): self
    {
        if (!$this->times->contains($time)) {
            $this->times->add($time);
            $time->setRelation($this);
        }

        return $this;
    }

    public function removeTime(Time $time): self
    {
        if ($this->times->removeElement($time)) {
            // set the owning side to null (unless already changed)
            if ($time->getRelation() === $this) {
                $time->setRelation(null);
            }
        }

        return $this;
    }
}
