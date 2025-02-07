<?php

namespace App\DataFixtures;

use App\Entity\Starship;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {

        // Création des utilisateurs (Admins, Pilotes, Customers)
        $admin = new User();
        $admin->setEmail('admin@starship.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminpass'));
        $manager->persist($admin);

        $pilot1 = new User();
        $pilot1->setEmail('pilot1@starship.com');
        $pilot1->setRoles(['ROLE_PILOT']);
        $pilot1->setPassword($this->passwordHasher->hashPassword($pilot1, 'pilotpass'));
        $manager->persist($pilot1);

        $pilot2 = new User();
        $pilot2->setEmail('pilot2@starship.com');
        $pilot2->setRoles(['ROLE_PILOT']);
        $pilot2->setPassword($this->passwordHasher->hashPassword($pilot2, 'pilotpass'));
        $manager->persist($pilot2);

        $customer = new User();
        $customer->setEmail('customer@starship.com');
        $customer->setRoles(['ROLE_CUSTOMER']);
        $customer->setPassword($this->passwordHasher->hashPassword($customer, 'customerpass'));
        $manager->persist($customer);


        $ships = [
            ['name' => 'Starship 1', 'class' => 'Explorer', 'captain' => $pilot1, 'status' => 'completed'],
            ['name' => 'Starship 2', 'class' => 'Destroyer', 'captain' => $pilot2, 'status' => 'in_progress'],
            ['name' => 'Starship 3', 'class' => 'Cruiser', 'captain' => $pilot1, 'status' => 'waiting'],
        ];

        foreach ($ships as $shipData) {
            $starship = new Starship();
            $starship->setName($shipData['name']);
            $starship->setClass($shipData['class']);
            $starship->setCaptain($shipData['captain']); // Assignation d'un pilote
            $starship->setStatus($shipData['status']);
            $manager->persist($starship);
        }


        // Enregistre toutes les entités en base
        $manager->flush();


    }


}
