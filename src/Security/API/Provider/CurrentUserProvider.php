<?php

namespace App\Security\API\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\Security\User;
use App\Security\API\DTO\UserInformation;
use Symfony\Bundle\SecurityBundle\Security;

readonly class CurrentUserProvider implements ProviderInterface
{
    public function __construct(private Security $security)
    {
    }

    /**
     * @inheritDoc
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        /** @var User|null $user */
        $user = $this->security->getUser();
        if (null === $user) {
            throw new \LogicException('The current user is not authenticated.');
        }
        return new UserInformation(
            $user->getName(),
            $user->getEmail(),
            $user->getRole()
        );
    }
}
