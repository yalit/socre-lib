<?php

namespace App\Library\Search\Enum;

enum LibrarySearchOrderByValue: string
{
    case TITLE = 'title';
    case CREATED_AT = 'createdAt';
}
