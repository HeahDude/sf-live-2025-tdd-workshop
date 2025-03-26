<?php

namespace App\Tests;

use App\WordWrapper;
use PHPUnit\Framework\TestCase;

class WordWrapperTest extends TestCase
{
    public function testWrap(): void
    {
        $wrapper = new WordWrapper();

        self::assertSame('', $wrapper->wrap('', 1));
        self::assertSame("x\nx", $wrapper->wrap('xx', 1));
        self::assertSame("x\nx", $wrapper->wrap('xx', 1));
    }
}
