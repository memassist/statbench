<?php

namespace Statbench\Tests\Unit\Params;

use PHPUnit\Framework\TestCase;

use Statbench\Params\ParamsMain;

class ParamsMainTest extends TestCase
{
    public function testDefaultMembersReturn()
    {
        $params = new ParamsMain();
        $this->assertEquals(2, $params->getVerbosity());
        $this->assertEquals(0.05, $params->getTargetRelPrecision());
        $this->assertEquals(0, $params->getTargetAbsPrecision());
        $this->assertEquals(20, $params->getInitialRuns());
        $this->assertEquals(1000, $params->getMaxIterations());
        $this->assertEquals('mad_dev', $params->getVariabilityMeasure());
        $this->assertEquals([], $params->getInstances());
        $this->assertEquals(false, $params->getStarted());
        $this->assertEquals(3, $params->getOutlierRejection());
        $this->assertEquals(true, $params->getSubtractDryRun());
    }

    public function testCustomMembersReturn()
    {
        $params = new ParamsMain(
            1,
            0.10,
            0.02,
            50,
            1200,
            'std_dev',
            [],
            true,
            4,
            false
        );
        $this->assertEquals(1, $params->getVerbosity());
        $this->assertEquals(0.10, $params->getTargetRelPrecision());
        $this->assertEquals(0.02, $params->getTargetAbsPrecision());
        $this->assertEquals(50, $params->getInitialRuns());
        $this->assertEquals(1200, $params->getMaxIterations());
        $this->assertEquals('std_dev', $params->getVariabilityMeasure());
        $this->assertEquals([], $params->getInstances());
        $this->assertEquals(true, $params->getStarted());
        $this->assertEquals(4, $params->getOutlierRejection());
        $this->assertEquals(false, $params->getSubtractDryRun());
    }
}
