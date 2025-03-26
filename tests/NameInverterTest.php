<?php

namespace App\Tests;

use App\NameInverter;
use PHPUnit\Framework\TestCase;

class NameInverterTest extends TestCase
{
    public function testInvertEmpty(): void
    {
        $nameInverter = new NameInverter();

        self::assertSame('', $nameInverter->invert(null));
        self::assertSame('', $nameInverter->invert(''));
    }

    public function testInvertSimpleName(): void
    {
        $nameInverter = new NameInverter();

        $name = 'Toto';

        self::assertSame($name, $nameInverter->invert($name));
    }
}
