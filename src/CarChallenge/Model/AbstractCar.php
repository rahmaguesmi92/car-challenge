<?php
namespace CarChallenge\Model;

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
        /**
         * @Todo: Implement
         */
    }

    public function addPassenger(Passenger $passenger)
    {
        /**
         * @Todo: Implement
         */
    }

    public function addLuggage(Luggage $luggage)
    {
        /**
         * @Todo: Implement
         */
    }

}
