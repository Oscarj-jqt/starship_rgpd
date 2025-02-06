<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }
    public function findAll(): array
    {
        $this->logger->info('Starship collection retrieved');

        return [
            new Starship(
                1,
                'Starship 1',
                'Garden',
                'Jean-Luc Pickles',
                StarshipStatusEnum::COMPLETED
            ),
            new Starship(
                2,
                'Starship 2',
                'Delta Tourist',
                'Kathryn Journeyway',
                StarshipStatusEnum::IN_PROGRESS
            ),
            new Starship(
                3,
                'Starship 3',
                'Latte',
                'James T.Quick',
                StarshipStatusEnum::WAITING
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }


}