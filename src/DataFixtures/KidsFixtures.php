<?php

namespace App\DataFixtures;

use App\Entity\Children;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
;

class KidsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 120; ++$i) {
            $kid = new Children();
            $kid->setLang('fr');
            $kid->setName('Kid '.$i);
            $kid->setProfile($this->getReference('profile_'.rand(0,60)));
            $manager->persist($kid);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProfileGirlFixtures::class,
        ];
    }
}
