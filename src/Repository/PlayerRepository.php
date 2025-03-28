<?php

namespace App\Repository;

use App\Entity\GameResult;
use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Player> */
class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    public function getScoreboard(): array
    {
        return $this->createQueryBuilder('player')
            ->leftJoin(GameResult::class, 'result', 'WITH', 'player = result.player')
            ->addSelect('COUNT(result) AS score')
            ->where('result.victory = TRUE')
            ->groupBy('player')
            ->getQuery()
            ->getResult()
        ;
    }
}
