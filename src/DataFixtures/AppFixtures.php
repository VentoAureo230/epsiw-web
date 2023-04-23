<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{

    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'une boucle qui va créer 10 articles aléatoires
        // Chaque article aura un titre, un contenu, une date de publication qui seront générés aléatoirement
        for ($i=1; $i <= 10; $i++) { 
            $user = new User();
            $user->setName($this->faker->name())
                ->setFirstName($this->faker->name())
                # ->setEmail($this->faker->email())
                ->setLogin($this->faker->name())
                ->setPassword($this->faker->numberBetween(10000, 9999999))
                ->setIsAdmin($this->faker->boolean())
                ->setIsVerified($this->faker->boolean())
                ->setIsRegistered($this->faker->boolean());
            $manager->persist($user);
        }
        $manager->flush();
    }
}