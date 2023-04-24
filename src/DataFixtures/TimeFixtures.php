<?php

namespace App\DataFixtures;

use App\Entity\Time;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TimeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        $times = new DateTime('now');

        foreach ($days as $day) {
            $time = new Time;
            $time->setDay($day);
            $time->setAmOpen('11:00');
            $time->setAmClose('15:00');
            $time->setPmOpen('18:30');
            $time->setPmClose('22:30');

            $restaurant = $this->getReference('rest');
            $time->setRestaurant($restaurant);

            $manager->persist($time);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            'class' => RestaurantFixtures::class
        ];
    }
}
