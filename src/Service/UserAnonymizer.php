<?php

namespace App\Service;

use App\Entity\User;

class UserAnonymizer
{
    public function anonymize(User $user): void
    {
        $user->setEmail('anonymous_'.$user->getId().'@example.com');
        $user->setDeletedAt(new \DateTime());
    }
}
