<?php

namespace App\Tests\Repository;

use App\Entity\GameResult;
use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlayerRepositoryTest extends KernelTestCase
{
    public function testScoreboardEmpty(): void
    {
        $scoreboard = $this->getPlayerRepository()->getScoreboard();

        self::assertEmpty($scoreboard);
    }

    public function testScoreboardWithOneVictory(): void
    {
        $player = new Player('player');
        $result = new GameResult($player, true);
        $player2 = new Player('player2');
        $result2 = new GameResult($player2, false);

        /** @var EntityManagerInterface $em */
        $em = self::getContainer()->get(EntityManagerInterface::class);
        $em->persist($player);
        $em->persist($result);
        $em->persist($player2);
        $em->persist($result2);
        $em->flush();

        self::assertCount(1, $this->getPlayerRepository()->getScoreboard());
    }

    private function getPlayerRepository(): PlayerRepository
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = self::getContainer()->get(PlayerRepository::class);

        return $playerRepository;
    }
}
