<?php

namespace App\Bowling;

class BowlingGame
{
    /** @var list<int> */
    private array $rolls = [];
    private int $currentRoll = 0;

    public function roll(int $pins): void
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function getScore(): int
    {
        $score = 0;
        $frameIndex = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if (10 === $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1]) {
                // Spare
                $score += 10 + $this->rolls[$frameIndex + 2];
            } else {
                $score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
            }

            $frameIndex += 2;
        }

        return $score;
    }
}
