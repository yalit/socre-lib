<?php

namespace DataFixtures\Library;

use App\Entity\Library\Artist;
use App\Entity\Library\Enum\ArtistType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public const ARTIST_REFERENCE = 'score-artist_%s';

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $artist = new Artist();
            $artist->setName(sprintf('Artist - %d', $i));
            $manager->persist($artist);
            $this->addReference(sprintf(self::ARTIST_REFERENCE, $i), $artist);
        }

        $manager->flush();
    }
}
