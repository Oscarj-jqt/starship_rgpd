<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Starship;

class AppFixtures extends Fixture
{
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

$manager->flush(); // Enregistre toutes les entités en base
}
}
