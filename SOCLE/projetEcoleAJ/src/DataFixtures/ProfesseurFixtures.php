<?php

namespace App\DataFixtures;
use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $sourceDir = 'C:\xampp\htdocs\travail\SYMFONY\projetEcoleAJ 20250118\SOCLE\projetEcoleAJ/public/images/';
        $targetDir = 'C:\xampp\htdocs\travail\SYMFONY\projetEcoleAJ 20250118\SOCLE\projetEcoleAJ/public/images/dtfixture';

        for ($i = 0; $i < 100; $i++) {
            $professeur = new Professeur();
            $professeur
                ->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setEmail($faker->email())
                ->setPassword($faker->sentence())
                ->setRoles(["ROLE_USER"])
                ->setDateEmbauche($faker->dateTimeBetween('-1 year', 'now'))
                ->setPoste($faker->numberBetween(0,16))
                ->setImageFile($faker->file($sourceDir, $targetDir, true )) // Generating a fake image URL
                ;
        
            $manager->persist($professeur);
        }
        $manager->flush();
    }
}
