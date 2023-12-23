<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profile;
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

            $adminProfile = new Profile();
            $adminProfile->setUser($adminUser);
            $adminProfile->setFirstName('Admin');
            $adminProfile->setLastName('Admin');
            $adminProfile->setCountry('France');
            $adminProfile->setCity('Paris');
            $adminProfile->setBirthday($faker->dateTimeBetween('-30 years', '-20 years'));
            $adminProfile->setPhoneNumber($faker->phoneNumber);
            $adminProfile->setJob($faker->jobTitle);
            $adminProfile->setSize($faker->numberBetween(150, 200));
            $adminProfile->setWeight($faker->numberBetween(50, 100));
            $adminProfile->setFamilyStatus($faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)']));
            $adminProfile->setAboutMe('Admin');
            $adminProfile->setLookFor('Admin');
        
            $manager->persist($adminProfile);
        $manager->persist($adminUser);

        // création de 10 utilisateurs de type "ROLE_BOY
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles($faker->randomElements(new \ArrayIterator(['ROLE_BOY'])));
            $user->setPassword($this->userPasswordHasher->hashPassword($adminUser, '0000'));
            $user->setIsVerified(true);
                $userProfile = new Profile();
                $userProfile->setUser($user);
                $userProfile->setFirstName($faker->firstName);
                $userProfile->setLastName($faker->lastName);
                $userProfile->setCountry($faker->country);
                $userProfile->setCity($faker->city);
                $userProfile->setBirthday($faker->dateTimeBetween('-30 years', '-20 years'));
                $userProfile->setPhoneNumber($faker->phoneNumber);
                $userProfile->setJob($faker->jobTitle);
                $userProfile->setSize($faker->numberBetween(150, 200));
                $userProfile->setWeight($faker->numberBetween(50, 100));
                $userProfile->setFamilyStatus($faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)']));
                $userProfile->setAboutMe($faker->text(200));
                $userProfile->setLookFor($faker->text(200));
                // boucle pour créer 5 images de garcons
                $Images = [];
                for ($j = 0; $j < rand(1,5); $j++) {
                    $Images[] = $faker->imageUrl(640, 480, 'people');
                }
                $userProfile->setBoyPicture($Images);
                $manager->persist($userProfile);
            
            $manager->persist($user);
        }

        // création de 10 utilisateurs de type "ROLE_GIRL
        for ($i = 11; $i <= 41; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles($faker->randomElements(new \ArrayIterator(['ROLE_GIRL'])));
            $user->setPassword($this->userPasswordHasher->hashPassword($adminUser, '0000'));
            $user->setIsVerified(true);
                $userProfile = new Profile();
                $userProfile->setUser($user);
                $userProfile->setFirstName($faker->firstName);
                $userProfile->setLastName($faker->lastName);
                $userProfile->setCountry($faker->country);
                $userProfile->setCity($faker->city);
                $userProfile->setBirthday($faker->dateTimeBetween('-30 years', '-20 years'));
                $userProfile->setPhoneNumber($faker->phoneNumber);
                $userProfile->setJob($faker->jobTitle);
                $userProfile->setSize($faker->numberBetween(150, 200));
                $userProfile->setWeight($faker->numberBetween(50, 100));
                $userProfile->setFamilyStatus($faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)']));
                $userProfile->setAboutMe($faker->text(200));
                $userProfile->setLookFor($faker->text(200));
                // boucle pour créer 5 images de filles
                $Images = [];
                for ($j = 0; $j < rand(1,5); $j++) {
                    $Images[] = $faker->imageUrl(640, 480, 'people');
                }
                $userProfile->setBoyPicture($Images);
                $userProfile->setHair($faker->randomElement(['Blond', 'Brun', 'Roux', 'Chatain', 'Noir', 'Blanc', 'Gris', 'Autre']));
                $userProfile->setEyes($faker->randomElement(['Bleu', 'Marron', 'Vert', 'Gris', 'Noir', 'Autre']));
                $userProfile->setEducation($faker->randomElement(['Bac', 'Bac +2', 'Bac +3', 'Bac +5', 'Bac +8', 'Autre']));
                $userProfile->setChildren($faker->randomElement(['Oui', 'Non']));
                $manager->persist($userProfile);
            
            $manager->persist($user);
        }


        $manager->flush();
    }
}
