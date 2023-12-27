<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class EyesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $eyes = [
            ['Lang' => 'Fr', 'Name' => 'Bleu'],
            ['Lang' => 'Fr', 'Name' => 'Marron'],
            ['Lang' => 'Fr', 'Name' => 'Vert'],
            ['Lang' => 'Fr', 'Name' => 'Gris'],
            ['Lang' => 'Fr', 'Name' => 'Noir'],
            ['Lang' => 'Fr', 'Name' => 'Autre'],
            ['Lang' => 'En', 'Name' => 'Blue'],
            ['Lang' => 'En', 'Name' => 'Brown'],
            ['Lang' => 'En', 'Name' => 'Green'],
            ['Lang' => 'En', 'Name' => 'Grey'],
            ['Lang' => 'En', 'Name' => 'Black'],
            ['Lang' => 'En', 'Name' => 'Other'],
        ];

        foreach ($eyes as $key => $eye) {
            $eyes = new \App\Entity\Eyes();
            $eyes->setLang($eye['Lang']);
            $eyes->setName($eye['Name']);
            $this->addReference('eyes_' . $key, $eyes);

            $manager->persist($eyes);
        }

        $manager->flush();
    }
}
