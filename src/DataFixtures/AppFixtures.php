<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr:FR');
        for($i=0;$i<20; $i++){
            $product = new Product();
            $product->setName($faker->name);
            $product->setDescription($faker->realText);
            $product->setCreationDate($faker->dateTime('-2 years'));
            $product->setImage($faker->imageUrl);

            $manager->persist($product);
        }
        $manager->flush();

    }
}
