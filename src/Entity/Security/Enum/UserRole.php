<?php

namespace App\Entity\Security\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case CREATOR = 'creator';
    case SET_MANAGER = 'set_manager';
}
