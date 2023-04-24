<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $admin = new User;
        $admin->setFirstname('thomas');
        $admin->setLastname('garenne');
        $admin->setPhone('0000000000');
        $admin->setEmail('admin@admin.fr');
        $admin->setPassword('admin');

        $manager->persist($admin);

        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setPhone($faker->phoneNumber());
            $user->setEmail($faker->email());
            $user->setPassword('admin');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
