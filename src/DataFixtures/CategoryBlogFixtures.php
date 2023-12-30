<?php

namespace App\DataFixtures;

use App\Entity\CategoryBlog;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class CategoryBlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 6; ++$i) {
            $categoryBlog = new CategoryBlog();
            $categoryBlog->setName($faker->sentence(3, true));
            $categoryBlog->setSlug($faker->slug);
            $categoryBlog->setLang('Fr');
            $manager->persist($categoryBlog); 
            $this->addReference('categoryBlog_' . $i, $categoryBlog);
        }

        $manager->flush();
    }
}
