<?php

namespace App\Tests;

use App\Entity\GameResult;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;

trait PlayerTestCaseTrait
{
    private function createPlayerGameResult(
        string $nickname,
        bool $victory,
        int $honorPoints = 0,
    ): void {
        $player = new Player($nickname);
        for ($i = 0; $i < $honorPoints; $i++) {
            $player->addHonorPoint();
        }
        $result = new GameResult($player, $victory);

        /** @var EntityManagerInterface $em */
        $em = self::getContainer()->get(EntityManagerInterface::class);
        $em->persist($player);
        $em->persist($result);
        $em->flush();
    }
}
