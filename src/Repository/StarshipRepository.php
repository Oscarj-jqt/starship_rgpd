<?php

namespace App\Repository;

use App\Model\Starship;

class StarshipRepository
{
    public function findAll(): array
    {
        return [
            new Starship(
                1,
                'Starship 1',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q'
            ),
            new Starship(
                2,
                'Starship 2',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction'
            ),
            new Starship(
                3,
                'Starship 3',
                'Latte',
                'James T.Quick',
                'repaired'
            ),
        ];
    }
}