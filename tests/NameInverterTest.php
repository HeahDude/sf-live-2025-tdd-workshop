<?php

namespace App\Tests;

use App\NameInverter;
use PHPUnit\Framework\TestCase;

class NameInverterTest extends TestCase
{
    private NameInverter $inverter;

    protected function setUp(): void
    {
        $this->inverter = new NameInverter();
    }

    public function testInvertEmpty(): void
    {
        self::assertSame('', $this->inverter->invert(null));
        self::assertSame('', $this->inverter->invert(''));
    }

    public function testInvertSimpleName(): void
    {
        $name = 'Toto';

        self::assertSame($name, $this->inverter->invert($name));
    }

    public function testInvertSimpleNameWithSpaces(): void
    {
        $name = ' Toto ';

        self::assertSame('Toto', $this->inverter->invert($name));
    }

    public function testInvertFullName(): void
    {
        $name = 'Toto Tata';

        self::assertSame('Tata, Toto', $this->inverter->invert($name));
    }

    public function testInvertFullNameWithInnerSpaces(): void
    {
        $name = ' Toto  Tata ';

        self::assertSame('Tata, Toto', $this->inverter->invert($name));
    }

    /**
     * @dataProvider provideHonorifics
     */
    public function testInvertFullNameWithHonorifics(string $honorific): void
    {
        $name = $honorific.' Toto Tata';

        self::assertSame('Tata, Toto', $this->inverter->invert($name));
    }

    public function provideHonorifics(): iterable
    {
        yield 'Mr.' => ['Mr.'];
        yield 'Mr' => ['Mr'];
        yield 'Mrs.' => ['Mrs.'];
        yield 'Mrs' => ['Mrs'];
        yield 'Ms.' => ['Ms.'];
        yield 'Ms' => ['Ms'];
    }

    public function testInvertFullNameWithPostNominals(): void
    {
        $name = 'Toto Tata Bs. PhD.';

        self::assertSame('Tata, Toto Bs. PhD.', $this->inverter->invert($name));
    }

    public function testInvertIntegrated(): void
    {
        $name = 'Mr. Toto Tata III Bs. PhD.';

        self::assertSame('Tata, Toto III Bs. PhD.', $this->inverter->invert($name));
    }
}
