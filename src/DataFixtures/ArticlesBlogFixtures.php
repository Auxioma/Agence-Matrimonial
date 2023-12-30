<?php

namespace App\DataFixtures;

use App\Entity\ArticlesBlog;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
;

class ArticlesBlogFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 60; ++$i) {
            $articleBlog = new ArticlesBlog();
            $articleBlog->setTitle($faker->sentence(3, true));
            $articleBlog->setSlug($faker->slug);
            $articleBlog->setDescription($faker->sentence(3, true));
            $articleBlog->setCategory($this->getReference('categoryBlog_' . rand(0, 5)));
            $articleBlog->setPicture('01.jpg');

            $manager->persist($articleBlog); 
        }

        $manager->flush(); 
    }

    public function getDependencies()
    {
        return [
            CategoryBlogFixtures::class,
        ];
    }
}
