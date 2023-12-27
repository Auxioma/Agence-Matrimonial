<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class EducationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $education = [
            [
                'lang' => 'Fr',
                'name' => 'Bac',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +2',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +3',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +4',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +5',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +6',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +7',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +8',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +9',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +10',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +11',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +12',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +13',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +14',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +15',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +16',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +17',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +18',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +19',
            ],
            [
                'lang' => 'Fr',
                'name' => 'Bac +20',
            ],
            [
                'lang' => 'En',
                'name' => 'Bac',
            ],
            [
                'lang' => 'En',
                'name' => 'Bac +2',
            ],
            [
                'lang' => 'En',
                'name' => 'Bac'
            ],
        ];

        foreach ($education as $key => $edu) {
            $education = new \App\Entity\Education();
            $education->setLang($edu['lang']);
            $education->setName($edu['name']);
            $this->addReference('education_' . $key, $education);

            $manager->persist($education);
        }

        $manager->flush();
    }
}
