<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class UserGirlFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 60; $i++) {
            $girl = new User();
            $girl->setEmail($faker->email);
            $girl->setPassword($faker->password);
            $girl->setIsVerified(true);
            $girl->setRoles(['ROLE_GIRL']);
            $this->addReference('user_girl_' . $i, $girl);
            $manager->persist($girl);
        }

        $manager->flush();
    }
}
