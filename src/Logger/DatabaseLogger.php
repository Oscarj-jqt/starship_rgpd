<?php

namespace App\Logger;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\DataProcessingLog;

class DatabaseLogger extends AbstractProcessingHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function write(LogRecord $record): void
    {
        $logEntry = new DataProcessingLog();
        $logEntry->setLevel($record->level->value); // Monolog 3 utilise un objet Level
        $logEntry->setMessage($record->message);
        $logEntry->setContext($record->context);
        $logEntry->setCreatedAt(new \DateTime());

        $this->entityManager->persist($logEntry);
        $this->entityManager->flush();
    }
}

