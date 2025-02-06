<?php

namespace App\Logger;

use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use App\Entity\DataProcessingLog;

class DatabaseLogger extends AbstractProcessingHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(Logger::INFO);
        $this->entityManager = $entityManager;
    }

    protected function write(array $record): void
    {
        $log = new DataProcessingLog();
        $log->setUserId($record['extra']['userId'] ?? 0);
        $log->setAction($record['message']);
        $log->setTimestamp(new \DateTimeImmutable());

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }
}
