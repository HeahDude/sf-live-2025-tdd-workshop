<?php

namespace App\Tests;

use App\WordWrapper;
use PHPUnit\Framework\TestCase;

class WordWrapperTest extends TestCase
{
    public function testWrapBlank(): void
    {
        $wrapper = new WordWrapper();

        self::assertSame('', $wrapper->wrap('', 1));
    }

    public function testWrapShortLine(): void
    {
        $wrapper = new WordWrapper();

        self::assertSame('toto', $wrapper->wrap('toto', 5));
    }
}
