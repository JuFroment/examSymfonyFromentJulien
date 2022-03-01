<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $admin = new User();
        $admin->setEmail('admin@admin.admin');
        $admin->setPassword($this->hasher->hashPassword($admin, 'admin' ));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setNom('Ipsum');
        $admin->setPrenom('Lorem');
        $admin->setUsername('LoremIpsum');
        $this->addReference(3, $admin);

        $user1 = new User();
        $user1->setEmail('user1@user.user');
        $user1->setPassword($this->hasher->hashPassword($user1, 'user1'));
        $user1->setNom('Dolor');
        $user1->setPrenom('Sit');
        $user1->setUsername('DolorSit');
        $this->addReference(4, $user1);


        $manager->persist($admin);
        $manager->persist($user1);

        $manager->flush();
    }
}
