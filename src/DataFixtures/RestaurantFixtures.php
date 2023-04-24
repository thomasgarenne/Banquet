<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $restaurant = new Restaurant;
        $restaurant->setName('Le Banquet');
        $restaurant->setAddress('20 Rue du Banquet');
        $restaurant->setZipcode('33000');
        $restaurant->setCity('Bordeaux');
        $restaurant->setAboutUs('restaurant familiale');

        $this->setReference('rest', $restaurant);

        $manager->persist($restaurant);
        $manager->flush();
    }
}
