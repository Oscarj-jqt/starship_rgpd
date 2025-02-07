<?php

namespace App\Security\Voter;

use App\Entity\Starship;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class StarshipVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        return 'VIEW' === $attribute && $subject instanceof Starship;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        // Récupérer le vaisseau
        $starship = $subject;

        // Si l'utilisateur est admin, il peut voir tous les vaisseaux
        if (in_array('admin', $user->getRoles())) {
            return true;
        }

        // Si l'utilisateur est un pilote et est assigné à ce vaisseau
        if (in_array('pilot', $user->getRoles())) {
            return $starship->getCaptain() === $user->getUsername();
        }

        // Si l'utilisateur est un client et est assigné à ce vaisseau
        if (in_array('customer', $user->getRoles())) {
            return $starship->getCaptain() === $user->getUsername();
        }

        return false;
    }
}
