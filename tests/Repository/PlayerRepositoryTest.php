<?php

namespace App\Tests\Repository;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlayerRepositoryTest extends KernelTestCase
{
    public function testScoreboardEmpty(): void
    {
        self::assertEmpty($this->getPlayerRepository()->getScoreboard());
    }

    private function getPlayerRepository(): PlayerRepository
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = self::getContainer()->get(PlayerRepository::class);

        return $playerRepository;
    }
}
