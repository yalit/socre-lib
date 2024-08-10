<?php

namespace App\Repository\Library;

use App\Entity\Library\Score;
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

    public function getLatestScores(int $nb = 5, string $orderBy = 'createdAt', bool $ascending = false): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy(sprintf('s.%s', $orderBy), $ascending ? 'ASC' : 'DESC')
            ->setMaxResults($nb)
            ->getQuery()
            ->getResult();
    }
}
