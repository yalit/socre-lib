<?php

namespace App\Repository\Score;

use App\Entity\Score\Score;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Score>
 */
class ScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Score::class);
    }

    public function getLatestScores(): array
    {
        return $this->createQueryBuilder('s')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
