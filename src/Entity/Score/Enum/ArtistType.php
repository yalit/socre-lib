<?php

namespace App\Entity\Score\Enum;

enum ArtistType: string
{
    case COMPOSER = 'entity.artist.type.composer';
    case LYRICIST = 'entity.artist.type.lyricist';
    case OTHER = 'entity.artist.type.other';
}
