<?php

namespace App\Security\API\DTO;

use App\Entity\Security\Enum\UserRole;

class UserInformation
{
    public function __construct(
        private string   $name,
        private string   $email,
        private UserRole $role,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): UserRole
    {
        return $this->role;
    }
}
