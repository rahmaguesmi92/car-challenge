<?php

namespace Tests\CarChallenge;

use CarChallenge\Exception\NoEngineException;
use CarChallenge\Model\Engine\GasolineEngine;
use CarChallenge\Model\Tire;
use CarChallenge\Model\Van;
use CarChallenge\Model\Wheel;
use PHPUnit\Framework\TestCase;

class VanTest extends TestCase
{
    public function testStartEngineFailsWithoutEngine()
    {
        $this->expectException(NoEngineException::class);

        $van = new Van();
        $van->startEngine();
    }

    public function testStartWithEngine()
    {
        $van = new Van();
        $van->setEngine(new GasolineEngine());
        $van->startEngine();
    }

    public function addMoreThen4WheelsThrowsException()
    {
        $van = new Van();
        $van->addWheel(new Wheel(new Tire(19, 'Michellin T 1000')));
        $van->addWheel(new Wheel(new Tire(19, 'Michellin T 1000')));
        $van->addWheel(new Wheel(new Tire(19, 'Michellin T 1000')));
        $van->addWheel(new Wheel(new Tire(19, 'Michellin T 1000')));

        try {
            $van->addWheel(new Wheel(new Tire(19, 'Michellin T 1000')));
            $this->fail('not allowed to add 5 wheels per car!');
        } catch (\InvalidArgumentException $e) {
        }
    }

    public function testDoorCountIsValid()
    {
    }

    public function testSettingInvalidColorThrowsException()
    {
    }


}
