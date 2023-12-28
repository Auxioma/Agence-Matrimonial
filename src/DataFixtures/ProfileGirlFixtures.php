<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Profile;
use Symfony\Component\Uid\Uuid;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
;

class ProfileGirlFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 60; $i++) {
            $profileGirl = new Profile();
            $profileGirl->setUser($this->getReference('user_girl_' . $i));
            $profileGirl->setFirstName($faker->firstName);
            $profileGirl->setLastName($faker->lastName);
            $profileGirl->setCountry($faker->country);
            $profileGirl->setCity($faker->city);
            $profileGirl->setBirthday($faker->dateTimeBetween('-30 years', '-18 years'));
            $profileGirl->setPhoneNumber($faker->phoneNumber);
            $profileGirl->setJob($faker->jobTitle);
            $profileGirl->setSize($faker->numberBetween(150, 190));
            $profileGirl->setWeight($faker->numberBetween(40, 80));
            $profileGirl->setLang('Fr');
            $profileGirl->setAboutMe($faker->text(500));
            $profileGirl->setLookFor($faker->text(100));
            $profileGirl->setSex('F');
            $profileGirl->setFamilly($this->getReference('MaritalStatus_' . $faker->numberBetween(0, 3)));
            $profileGirl->setEyes($this->getReference('eyes_' . $faker->numberBetween(0, 5)));
            $profileGirl->setHair($this->getReference('hair_' . $faker->numberBetween(0, 5)));
            $profileGirl->setEducation($this->getReference('education_' . $faker->numberBetween(0, 11)));

            $img = [];
            for ($j = 0; $j <= $faker->numberBetween(1, 5); $j++) {
                $ImgNumber = $faker->numberBetween(1, 10);
                if (!in_array($ImgNumber, $img)) {
                    $img[] = $ImgNumber.'.jpg';
                }
            }
            $profileGirl->setPictures($img);

            $profileGirl->setReference(substr(Uuid::v4(), 0, 8));

            $profileGirl->setSlug($profileGirl->getFirstName() . '-' . $profileGirl->getLastName() . '-' . $profileGirl->getReference());
            
            $this->addReference('profile_' . $i, $profileGirl);
            $manager->persist($profileGirl);

        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserGirlFixtures::class,
        ];
    }

}
