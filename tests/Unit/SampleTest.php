<?php

namespace Statbench\Tests\Unit;

use PHPUnit\Framework\TestCase;

use Statbench\Params\ParamsConsole;

class SampleTest extends TestCase
{
    public function testTrueAssertsToTrue()
    {
        $params_console = new ParamsConsole();
        $this->assertEquals('', $params_console->getExecutable());
        $this->assertEquals('', $params_console->getCommand());
        $this->assertTrue(true);
    }
}
