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

        $ships = [
            ['name' => 'Starship 1', 'class' => 'Explorer', 'captain' => 'Jean-Luc Pickles', 'status' => 'completed'],
            ['name' => 'Starship 2', 'class' => 'Destroyer', 'captain' => 'Kathryn Journeyway', 'status' => 'in_progress'],
            ['name' => 'Starship 3', 'class' => 'Cruiser', 'captain' => 'James T. Quick', 'status' => 'waiting'],
        ];

        foreach ($ships as $shipData) {
            $starship = new Starship();
            $starship->setName($shipData['name']);
            $starship->setClass($shipData['class']);
            $starship->setCaptain($shipData['captain']);
            $starship->setStatus($shipData['status']);

            $manager->persist($starship);
        }

        $usersData = [
            ['email' => 'admin@starship.com', 'roles' => ['ROLE_ADMIN'], 'password' => 'admin123'],
            ['email' => 'pilot@starship.com', 'roles' => ['ROLE_PILOT'], 'password' => 'pilot123'],
            ['email' => 'customer@starship.com', 'roles' => ['ROLE_CUSTOMER'], 'password' => 'customer123'],
            ['email' => 'dpo@starship.com', 'roles' => ['ROLE_SPACE_CONTROLLER'], 'password' => 'dpo123'],
        ];

        foreach ($usersData as $userData) {
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setRoles($userData['roles']);
            $hashedPassword = $this->passwordHasher->hashPassword($user, $userData['password']);
            $user->setPassword($hashedPassword);
            $manager->persist($user);
        }


        // Enregistre toutes les entités en base
        $manager->flush();


    }


}
