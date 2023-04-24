<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Wine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker\Factory;

class WineFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $grappes = ['chardonet', 'pécharment', 'merlot', 'malbec', 'syrah', 'grenache'];

        for ($i = 0; $i < 10; $i++) {

            $wine = new Wine();
            $wine->setName($faker->text(5));
            $wine->setSlug($this->slugger->slug($wine->getName())->lower());
            $wine->setDomain($faker->text(5));
            $wine->setYear($faker->numberBetween(1950, 2022));
            $wine->setGrappes($faker->randomElement($grappes));
            $wine->setPrice($faker->numberBetween(1000, 10000));

            $category = $this->getReference('cat-' . rand(2, 4));
            $wine->setCategory($category);

            $manager->persist($wine);
        }

        $manager->flush();
    }
}
