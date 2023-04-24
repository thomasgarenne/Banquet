<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private int $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $vin = $this->create('Vins', null, $manager);
        $this->create('Rouge', $vin, $manager);
        $this->create('Blanc', $vin, $manager);
        $this->create('Rosé', $vin, $manager);

        $menu = $this->create('Menus', null, $manager);
        $this->create('Entrées', $menu, $manager);
        $this->create('Plats', $menu, $manager);
        $this->create('Desserts', $menu, $manager);

        $manager->flush();
    }

    public function create(string $name, ?Categories $parent = null, ObjectManager $manager)
    {
        $categories = new Categories;
        $categories->setName($name);
        $categories->setSlug($this->slugger->slug($categories->getName())->lower());
        $categories->setParent($parent);
        $manager->persist($categories);

        $this->setReference('cat-' . $this->counter, $categories);

        $this->counter++;

        return $categories;
    }
}
