<?php

namespace Statbench\Tests\Unit\Params;

use PHPUnit\Framework\TestCase;

use Statbench\Params\ParamsCsv;

final class ParamsCsvTest extends TestCase
{
    public function testDefaultMembersReturn(): void
    {
        $params = new ParamsCsv();
        $this->assertEquals(false, $params->getReduction());
        $this->assertEquals(null, $params->getInputFilename());
    }

    public function testCustomMembersReturn(): void
    {
        $params = new ParamsCsv(true, 'test_filename.csv');
        $this->assertEquals(true, $params->getReduction());
        $this->assertEquals('test_filename.csv', $params->getInputFilename());
    }
}
