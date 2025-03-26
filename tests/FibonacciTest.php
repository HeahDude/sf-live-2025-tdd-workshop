<?php

namespace App\Tests;

use App\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testFibonacci(): void
    {
        $cases = [
            0 => 0,
            1 => 1,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 5,
            6 => 8,
            7 => 13,
        ];

        foreach ($cases as $case => $expected) {
            self::assertSame($expected, Fibonacci::at($case));
        }
    }
}
