<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    ){}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Création d'un utilisateur de type "Administrateur"
        $adminUser = new User();
        $adminUser->setEmail('admin@admin.admin');
        $adminUser->setRoles(['ROLE_ADMIN']);
        $adminUser->setPassword($this->userPasswordHasher->hashPassword($adminUser, 'admin'));
        $adminUser->setIsVerified(true);
        $this->addReference('user_1', $adminUser);
        $manager->persist($adminUser);

        // Création d'un utilisateur de type "ROLE_BOY"
        $boyUser = new User();
        $boyUser->setEmail('boy@boy.boy');
        $boyUser->setRoles(['ROLE_BOY']);
        $boyUser->setPassword($this->userPasswordHasher->hashPassword($adminUser, 'boy'));
        $boyUser->setIsVerified(true);
        $this->addReference('user_2', $boyUser);    
        $manager->persist($boyUser);

        // création de 50 utilisateurs de type "ROLE_BOY et ROLE_GIRL
        for ($i = 3; $i <= 50; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles($faker->randomElements(new \ArrayIterator(['ROLE_BOY', 'ROLE_GIRL'])));
            $user->setPassword($this->userPasswordHasher->hashPassword($adminUser, '0000'));
            $user->setIsVerified(true);
            $this->addReference('user_' . $i, $user);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
