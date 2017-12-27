<?php

namespace Tests\CarChallenge\Model\Engine;

use CarChallenge\Exception\NoEngineException;
use CarChallenge\Model\Engine\GasolineEngine;
use PHPUnit\Framework\TestCase;

class GasolineEngineTest extends TestCase
{
    public function testStart()
    {
        $engine = new GasolineEngine(500, GasolineEngine::FUEL_TYPE__DIESEL);

        $this->assertEquals(500, $engine->getHorsePower());
        $this->assertEquals(GasolineEngine::FUEL_TYPE__DIESEL, $engine->getFuelType());

        $this->assertFalse($engine->isStarted());

        $engine->start();

        $this->assertTrue($engine->isStarted());
    }

    /**
     * @throws \LogicException
     */
    public function testCurrentConsumptionThrowsExceptionIfMotorIsNotStared()
    {
        $this->expectException(NoEngineException::class);
        $engine = new GasolineEngine(500, GasolineEngine::FUEL_TYPE__DIESEL);
        $engine->getCurrentGasolineConsumption();
    }

    public function TestCurrentConsumption()
    {
        $engine = new GasolineEngine(500, GasolineEngine::FUEL_TYPE__DIESEL);

        $this->assertGreaterThan(10, $engine->getCurrentGasolineConsumption(), 'Gasoline Consumption is at least 10l/100km');
    }
}
