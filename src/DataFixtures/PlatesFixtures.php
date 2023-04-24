<?php

namespace App\DataFixtures;

use App\Entity\Plate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class PlatesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $plate = new Plate();
            $plate->setName($faker->text(5));
            $plate->setSlug($this->slugger->slug($plate->getName())->lower());
            $plate->setDescription($faker->text(10));
            $plate->setPrice($faker->numberBetween(800, 10000));

            $category = $this->getReference('cat-' . rand(6, 8));
            $plate->setCategory($category);

            $allergy = $this->getReference('aler-' . rand(1, 5));
            $plate->setAllergies($allergy);

            $manager->persist($plate);
        }

        $manager->flush();
    }
}
