<?php

namespace App\DataFixtures;

use App\Entity\Familly;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class FamillyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $MaritalStatus = [
            ['Lang' => 'Fr', 'Name' => 'Célibataire'],
            ['Lang' => 'Fr', 'Name' => 'Marié(e)'],
            ['Lang' => 'Fr', 'Name' => 'Divorcé(e)'],
            ['Lang' => 'Fr', 'Name' => 'Veuf(ve)'],
            ['Lang' => 'En', 'Name' => 'Single'],
            ['Lang' => 'En', 'Name' => 'Married'],
            ['Lang' => 'En', 'Name' => 'Divorced'],
            ['Lang' => 'En', 'Name' => 'Widow'],
        ];

        foreach ($MaritalStatus as $key => $value) {
            $MaritalStatus = new Familly();
            $MaritalStatus->setLang($value['Lang']);
            $MaritalStatus->setName($value['Name']);
            $manager->persist($MaritalStatus);
            $this->addReference('MaritalStatus_' . $key, $MaritalStatus);
        }
        $manager->flush();
    }
}
