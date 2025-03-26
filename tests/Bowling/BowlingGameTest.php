<?php

namespace App\Tests\Bowling;

use App\Bowling\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    private BowlingGame $game;

    protected function setUp(): void
    {
        $this->game = new BowlingGame();
    }

    public function testAllGutters(): void
    {
        $this->rollMany(20, 0);

        self::assertSame(0, $this->game->getScore());
    }

    public function testAllOnes(): void
    {
        $this->rollMany(20, 1);

        self::assertSame(20, $this->game->getScore());
    }

    private function rollMany(int $times, int $pins): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->game->roll($pins);
        }
    }
}
