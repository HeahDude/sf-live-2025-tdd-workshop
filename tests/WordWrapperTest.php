<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class WordWrapperTest extends TestCase
{
    public function testWrapBlank(): void
    {
        $wrapper = new WordWrapper();

        self::assertSame('', $wrapper->wrap(''));
    }
}
