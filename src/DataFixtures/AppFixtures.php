<?php

namespace App\DataFixtures;
use App\Entity\Todo;
use App\Repository\TodoRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $todo = Array();
        for ($i = 0; $i < 50; $i++) {
            $todo[$i] = new Todo();
            $todo[$i]->setName($faker->name);
            $todo[$i]->setDescription('description '.$i);

            $manager->persist($todo[$i]);

        }

        $manager->flush();
    }
}