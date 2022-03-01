<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {


        $category1 = new Category();
        $category1->setLibelle('Actualité');
        $this->addReference(1, $category1);

        $category2 = new Category();
        $category2->setLibelle('Politique');
        $this->addReference(2, $category2);

        $manager->persist($category1);
        $manager->persist($category2);

        $manager->flush();
    }
}
