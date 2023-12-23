<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Accueil');
        $category->setSlug('app_home');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Adhérentes');
        $category->setSlug('app_profiles_list');
        $manager->persist($category);
        $manager->flush();
    }
}
