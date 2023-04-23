<?php

namespace App\Entity;

use App\Repository\AllergiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllergiesRepository::class)]
class Allergies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'allergies', targetEntity: plate::class)]
    private Collection $plate;

    public function __construct()
    {
        $this->plate = new ArrayCollection();
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
     * @return Collection<int, plate>
     */
    public function getPlate(): Collection
    {
        return $this->plate;
    }

    public function addPlate(plate $plate): self
    {
        if (!$this->plate->contains($plate)) {
            $this->plate->add($plate);
            $plate->setAllergies($this);
        }

        return $this;
    }

    public function removePlate(plate $plate): self
    {
        if ($this->plate->removeElement($plate)) {
            // set the owning side to null (unless already changed)
            if ($plate->getAllergies() === $this) {
                $plate->setAllergies(null);
            }
        }

        return $this;
    }
}
