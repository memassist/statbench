<?php

namespace Statbench\Tests\Unit\Params;

use PHPUnit\Framework\TestCase;

use Statbench\Params\ParamsConsole;
use Statbench\Params\ParamsCsv;
use Statbench\Params\ParamsMain;
use Statbench\Params\ParamsConsoleWrapper;

class ParamsConsoleWrapperTest extends TestCase
{
    public function testDefaultMembersReturn()
    {
        $params_console_wrapper = new ParamsConsoleWrapper(
            new ParamsConsole('testexecutable', 'testcommand'),
            new ParamsCsv(),
            new ParamsMain()
        );
        $this->assertEquals(
            new ParamsConsole('testexecutable', 'testcommand'),
            $params_console_wrapper->getParamsConsole()
        );
        $this->assertEquals(
            new ParamsCsv(),
            $params_console_wrapper->getParamsCsv()
        );
        $this->assertEquals(
            new ParamsMain(),
            $params_console_wrapper->getParamsMain()
        );
    }
}
