<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\SuccessStories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class SuccessStoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $facker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $successStories = new SuccessStories();
            $successStories->setTitle($facker->sentence($nbWords = 6, $variableNbWords = true));
            $successStories->setFirstName($facker->firstName($gender = null));
            $successStories->setPictures('01.jpg');
            $successStories->setDescription($facker->text($maxNbChars = 500));
            $manager->persist($successStories);
        }

        $manager->flush();
    }
}
