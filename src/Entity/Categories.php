<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Plate::class)]
    private Collection $plates;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Wine::class)]
    private Collection $wines;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Categories::class)]
    private Collection $categories;

    public function __construct()
    {
        $this->plates = new ArrayCollection();
        $this->wines = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
     * @return Collection<int, Plate>
     */
    public function getPlates(): Collection
    {
        return $this->plates;
    }

    public function addPlate(Plate $plate): self
    {
        if (!$this->plates->contains($plate)) {
            $this->plates->add($plate);
            $plate->setCategory($this);
        }

        return $this;
    }

    public function removePlate(Plate $plate): self
    {
        if ($this->plates->removeElement($plate)) {
            // set the owning side to null (unless already changed)
            if ($plate->getCategory() === $this) {
                $plate->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Wine>
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWine(Wine $wine): self
    {
        if (!$this->wines->contains($wine)) {
            $this->wines->add($wine);
            $wine->setCategory($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): self
    {
        if ($this->wines->removeElement($wine)) {
            // set the owning side to null (unless already changed)
            if ($wine->getCategory() === $this) {
                $wine->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setParent($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getParent() === $this) {
                $category->setParent(null);
            }
        }

        return $this;
    }
}
