<?php

namespace App\Entity\Security\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
