<?php

namespace App\Doctrine\Subscriber;

use App\Entity\Security\User;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsDoctrineListener(event: Events::prePersist)]
#[AsDoctrineListener(event: Events::preUpdate)]
class UserPasswordHasherSubscriber
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function prePersist(PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if(!( $entity instanceof User)){
            return;
        }

        $this->updatePassword($entity);
    }

    public function preUpdate(PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if(!( $entity instanceof User)){
            return;
        }

        $this->updatePassword($entity);
    }


    private function updatePassword(User $user): void
    {
        if ($user->getPlainPassword() === null) {
            return;
        }

        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPlainPassword()));
        $user->eraseCredentials();
    }
}
