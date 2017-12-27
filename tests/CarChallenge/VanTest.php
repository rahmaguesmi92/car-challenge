<?php

namespace Tests\CarChallenge;

use CarChallenge\Exception\DoorCountIsNotValidException;
use CarChallenge\Exception\InvalidColorException;
use CarChallenge\Exception\NoEngineException;
use CarChallenge\Exception\NotAllowedToAddFivePassengersPerCar;
use CarChallenge\Exception\NotAllowedToAddFiveWheelsPerCar;
use CarChallenge\Exception\NotAllowedToAddLuggageMoreThanTrunkVolume;
use CarChallenge\Model\Engine\GasolineEngine;
use CarChallenge\Model\Luggage;
use CarChallenge\Model\Passenger;
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
        $van->setEngine(new GasolineEngine(500, GasolineEngine::FUEL_TYPE__DIESEL));
        $this->assertTrue($van->startEngine());
    }

    public function testAddMoreThen4WheelsThrowsException()
    {
        $this->expectException(NotAllowedToAddFiveWheelsPerCar::class);
        
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
        $van = new Van();
        $van->setDoors(4);
        $van->getDoors();
        $this->assertEquals(4, $van->getDoors());
    }

    public function testDoorCountIsNotValid()
    {
        $this->expectException(DoorCountIsNotValidException::class);
        $van = new Van();
        $van->setDoors(5);
    }

    public function testSettingInvalidColorThrowsException()
    {
        $this->expectException(InvalidColorException::class);
        $van = new Van();
        $van->setColor('fake color');
    }


    public function testAddMoreThen4PassengersThrowsException()
    {
        $this->expectException(NotAllowedToAddFivePassengersPerCar::class);
        $van = new Van();
        $van->setSeats(3);
        $van->addPassenger(new Passenger());
        $van->addPassenger(new Passenger());
        $van->addPassenger(new Passenger());
        $van->addPassenger(new Passenger());

        try {
            $van->addPassenger(new Passenger());
            $this->fail('not allowed to add 5 passengers per car!');
        } catch (\InvalidArgumentException $e) {
        }
    }

    public function testAddMoreThenTrunkVolumeThrowsException()
    {
        $this->expectException(NotAllowedToAddLuggageMoreThanTrunkVolume::class);
        $van = new Van();
        $van->setTrunkVolume(100);
        $van->addLuggage(new Luggage(10));

        try {
            $van->addLuggage(new Luggage(100));
            $this->fail('not allowed to add more than trunk volume');
        } catch (\InvalidArgumentException $e) {
        }
    }


}
