<?php

namespace Statbench\Tests\Unit;

use PHPUnit\Framework\TestCase;

final class SampleTest extends TestCase
{
    public function testTrueAssertsToTrue(): void
    {
        $this->assertTrue(true);
    }
}
