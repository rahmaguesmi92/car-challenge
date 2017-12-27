<?php

namespace CarChallenge\Model\Engine;

use CarChallenge\Exception\NoEngineException;

abstract class AbstractEngine
{
    /**
     * @var int
     */
    protected $horsePower;

    /**
     * @var bool
     */
    protected $isStarted;

    /**
     * Retrieves the current gasoline consumption the engine uses in l/100km (rounded to int)
     *
     * @return int
     */
    public function getCurrentGasolineConsumption(): int
    {
        if($this->isStarted === false){
            throw new NoEngineException();
        }
        return 0;
    }

    /**
     * Retrieves the current electric consumption the engine uses in V/100km (rounded to int)
     *
     * @return int
     */
    public function getCurrentElectricConsumption(): int
    {
        if($this->isStarted === false){
            throw new NoEngineException();
        }
        return 0;
    }

    /**
     * @return int
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        return $this->isStarted;
    }

    public function start()
    {
        $this->isStarted = true;
    }
}
