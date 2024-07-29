<?php

namespace DataFixtures\Score;

use App\Entity\Score\Score;
use App\Entity\Score\ScoreReference;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ScoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $score = $this->getScore(
                'Score ' . $i,
                null,
                [$this->getScoreReference(chr(rand(65,90)).(string)rand(100,999))],
                [$this->getReference(sprintf(ArtistFixtures::ARTIST_REFERENCE, rand(1,3))), $this->getReference(sprintf(ArtistFixtures::ARTIST_REFERENCE, rand(4,6)))],
                [$this->getReference(sprintf(ScoreCategoryFixtures::SCORE_CATEGORY_REFERENCE, rand(1,10)))]
            );
            $manager->persist($score);
        }

        $manager->flush();
    }

    private function getScoreReference(string $value): ScoreReference
    {
        $reference = new ScoreReference();
        $reference->setValue($value);
        return $reference;
    }

    private function getScore(
        string  $title,
        ?string $description = '',
        array   $refs = [],
        array   $artists = [],
        array   $categories = [],
        array   $files = [],
    ): Score
    {
        $score = new Score();
        $score->setTitle($title);
        $score->setDescription($description);
        foreach ($refs as $ref) {
            $score->addRef($ref);
        }

        foreach ($artists as $artist) {
            $score->addArtist($artist);
        }

        foreach ($categories as $category) {
            $score->addCategory($category);
        }

        foreach ($files as $file) {
            $score->addFile($file);
        }

        return $score;
    }

    public function getDependencies()
    {
        return [
            ScoreCategoryFixtures::class,
            ArtistFixtures::class
        ];
    }
}
