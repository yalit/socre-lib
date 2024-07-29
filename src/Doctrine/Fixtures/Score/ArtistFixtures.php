<?php

namespace DataFixtures\Score;

use App\Entity\Score\Artist;
use App\Entity\Score\Enum\ArtistType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public const ARTIST_REFERENCE = 'score-artist_%s';

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $artist = new Artist();

            $type = match ($i) {
                1, 2, 3 => ArtistType::COMPOSER,
                4, 5, 6 => ArtistType::LYRICIST,
                7, 8, 9, 10 => ArtistType::OTHER
            };
            $artist->setName(sprintf('Artist - %s - %d', $type->name, $i));
            $artist->setType($type);

            $manager->persist($artist);
            $this->addReference(sprintf(self::ARTIST_REFERENCE, $i), $artist);
        }

        $manager->flush();
    }
}
