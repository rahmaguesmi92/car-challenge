<?php

namespace Tests\CarChallenge\Model\Engine;

use CarChallenge\Model\Engine\ElectricEngine;
use PHPUnit\Framework\TestCase;

class ElectricEngineTest extends TestCase
{
    public function testStart()
    {
        $engine = new ElectricEngine(200);

        $this->assertEquals(200, $engine->getHorsePower());
        
        $this->assertFalse($engine->isStarted());

        $engine->start();

        $this->assertTrue($engine->isStarted());
    }
}
