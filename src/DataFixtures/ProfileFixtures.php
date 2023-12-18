<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class ProfileFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Profile administrateur
        $adminProfile = new Profile();
        $adminProfile->setUser($this->getReference('user_1'));
        $adminProfile->setFirstName('Admin');
        $adminProfile->setLastName('Admin');
        $adminProfile->setCountry('France');
        $adminProfile->setCity('Paris');
        $adminProfile->setBirthday($faker->dateTimeBetween('-30 years', '-20 years'));
        $adminProfile->setPhoneNumber($faker->phoneNumber);
        $adminProfile->setJob($faker->jobTitle);
        $adminProfile->setSize($faker->numberBetween(150, 200));
        $adminProfile->setWeight($faker->numberBetween(50, 100));
        $adminProfile->setFamilyStatus($faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)']));
        $adminProfile->setAboutMe($faker->text(200));
        $adminProfile->setLookFor($faker->text(200));
        
        $manager->persist($adminProfile);

        $manager->flush();
    }
}
