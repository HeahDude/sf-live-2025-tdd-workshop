<?php

namespace App\Bowling;

class BowlingGame
{
    private int $pins = 0;

    public function roll(int $pins): void
    {
        $this->pins += $pins;
    }

    public function getScore(): int
    {
        return $this->pins;
    }
}
