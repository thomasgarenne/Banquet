<?php

namespace App\DataFixtures;

use App\Entity\Allergies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AllergiesFixtures extends Fixture
{
    private int $counter = 1;

    public function load(ObjectManager $manager)
    {
        $allergene = ['arachide', 'gluten', 'mollusques', 'lupin', 'Fruits à coques'];

        foreach ($allergene as $alergy) {
            $allergy = new Allergies;
            $allergy->setName($alergy);
            $manager->persist($allergy);

            $this->setReference('aler-' . $this->counter, $allergy);
            $this->counter++;
        }

        $manager->flush();
    }
}
