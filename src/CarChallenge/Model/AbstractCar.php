<?php

namespace CarChallenge\Model;

use CarChallenge\Exception\DoorCountIsNotValidException;
use CarChallenge\Exception\InvalidColorException;
use CarChallenge\Exception\NoEngineException;
use CarChallenge\Exception\NotAllowedToAddFivePassengersPerCar;
use CarChallenge\Exception\NotAllowedToAddFiveWheelsPerCar;
use CarChallenge\Exception\NotAllowedToAddLuggageMoreThanTrunkVolume;
use CarChallenge\Model\Engine\AbstractEngine;

abstract class AbstractCar
{
    const COLOR_RED = 'red';
    const COLOR_BLUE = 'blue';

    protected $seats;
    protected $engine;
    protected $wheels;
    protected $doors;
    protected $trunkVolume;
    protected $color;
    protected $passengers;

    /**
     * @return int
     */
    public function getSeats(): int
    {
        return $this->seats;
    }

    /**
     * @param int $seats
     * @return AbstractCar
     */
    public function setSeats(int $seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * @return AbstractEngine
     */
    public function getEngine(): AbstractEngine
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     * @return AbstractCar
     */
    public function setEngine(AbstractEngine $engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return Wheel[]
     */
    public function getWheels()
    {
        return $this->wheels;
    }

    /**
     * @param Wheel $wheel
     *
     * @return AbstractCar
     */
    public function addWheel(Wheel $wheel)
    {
        if (count($this->getWheels()) === 4) {
            throw new NotAllowedToAddFiveWheelsPerCar();
        }
        $this->wheels[] = $wheel;

        return $this;
    }

    /**
     * @return int
     */
    public function getDoors(): int
    {
        return $this->doors;
    }

    /**
     * @param int $doors
     * @return AbstractCar
     */
    public function setDoors(int $doors)
    {
        if ($doors > 4) {
            throw new DoorCountIsNotValidException();
        }
        $this->doors = $doors;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrunkVolume(): int
    {
        return $this->trunkVolume;
    }

    /**
     * @param int $trunkVolume
     * @return AbstractCar
     */
    public function setTrunkVolume(int $trunkVolume)
    {
        $this->trunkVolume = $trunkVolume;

        return $this;
    }

    public function startEngine()
    {
        if ($this->engine === null) {
            throw new NoEngineException();
        }
        $this->getEngine()->start();

        return $this->getEngine()->isStarted();
    }


    public function addPassenger(Passenger $passenger)
    {
        if (count($this->passengers) > $this->seats) {
            throw new NotAllowedToAddFivePassengersPerCar();
        }
        $this->passengers[] = $passenger;

        return $this;
    }

    public function addLuggage(Luggage $luggage)
    {
        if ($luggage->getWeight() > $this->trunkVolume) {
            throw new NotAllowedToAddLuggageMoreThanTrunkVolume();
        }
        $this->trunkVolume -= $luggage->getWeight();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor(string $color)
    {
        if ($color !== self::COLOR_BLUE && $color !== self::COLOR_RED) {
            throw new InvalidColorException();
        }
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

}
