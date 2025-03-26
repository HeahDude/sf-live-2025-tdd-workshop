<?php

namespace App;

class Fibonacci
{
    public static function at(int $position): int
    {
        return match ($position) {
            0, 1 => $position,
            default => self::compute($position),
        };
    }

    private static function compute(int $position): int
    {
        $previous = 1;
        $current = 1;

        for ($i = 2; $i < $position; $i++) {
            $temp = $current + $previous;
            $previous = $current;
            $current = $temp;
        }

        return $current;
    }
}
