<?php

namespace Statbench\Tests\Unit\Console;

use PHPUnit\Framework\TestCase;

use Statbench\Console\ConsoleIO;

class ConsoleIOTest extends TestCase
{
    public function testGetsReturnsInputStream()
    {
        $i = fopen('php://memory', 'w+');
        $o = fopen('php://memory', 'w+');
        $io = new ConsoleIO($i, $o);

        fwrite($i, 'test_input_text');
        fseek($i, 0);

        $this->assertEquals('test_input_text', $io->gets());

        fclose($i);
        fclose($o);
    }

    public function testPutsWithoutParametersWritesToOutputStream()
    {
        $i = fopen('php://memory', 'w+');
        $o = fopen('php://memory', 'w+');
        $io = new ConsoleIO($i, $o);

        $io->puts('Test output text');

        fseek($o, 0);
        $output = stream_get_contents($o);
        $this->assertEquals('Test output text'.PHP_EOL, $output);
        fclose($i);
        fclose($o);
    }

    public function testPutsWithNewlineParameterSetToFalseWritesToOutputStream()
    {
        $i = fopen('php://memory', 'w+');
        $o = fopen('php://memory', 'w+');
        $io = new ConsoleIO($i, $o);

        $io->puts('Test output text', null, false);

        fseek($o, 0);
        $output = stream_get_contents($o);
        $this->assertEquals('Test output text', $output);
        fclose($i);
        fclose($o);
    }

    public function testPutsWithStyleParameterSetWritesToOutputStream()
    {
        $i = fopen('php://memory', 'w+');
        $o = fopen('php://memory', 'w+');
        $io = new ConsoleIO($i, $o);

        $io->puts('Test output text', ConsoleIO::STYLE_RED, false);

        fseek($o, 0);
        $output = stream_get_contents($o);
        $this->assertEquals("\033[0;31;31mTest output text\033[0m", $output);
        fclose($i);
        fclose($o);
    }
}
