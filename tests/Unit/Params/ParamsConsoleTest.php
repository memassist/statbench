<?php

namespace Statbench\Tests\Unit\Params;

use PHPUnit\Framework\TestCase;

use Statbench\Params\ParamsConsole;

class ParamsConsoleTest extends TestCase
{
    public function testDefaultMembersReturn()
    {
        $params = new ParamsConsole();
        $this->assertEquals('statbench', $params->getExecutable());
        $this->assertEquals('', $params->getCommand());
    }

    public function testCustomMembersReturn()
    {
        $params = new ParamsConsole(
            'statbench_custom',
            'list'
        );
        $this->assertEquals('statbench_custom', $params->getExecutable());
        $this->assertEquals('list', $params->getCommand());
    }
}
