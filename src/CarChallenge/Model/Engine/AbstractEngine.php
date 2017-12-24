<?php

namespace CarChallenge\Model\Engine;

abstract class AbstractEngine
{
    protected $horsePower;

    /**
     * Retrieves the current gasoline consumption the engine uses in l/100km (rounded to int)
     *
     * @return int
     */
    public function getCurrentGasolineConsumption(): int
    {
        return 0;
    }

    /**
     * Retrieves the current electric consumption the engine uses in V/100km (rounded to int)
     *
     * @return int
     */
    public function getCurrentElectricConsumption(): int
    {
        return 0;
    }
}
