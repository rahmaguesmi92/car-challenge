<?php

namespace CarChallenge\Model\Engine;

use CarChallenge\Exception\NoEngineException;

class GasolineEngine extends AbstractEngine
{
    const FUEL_TYPE__GAS = 'gas';
    const FUEL_TYPE__DIESEL = 'diesel';

    /**
     * @var string
     */
    protected $fuelType;

    /**
     * GasolineEngine constructor.
     * @param int $horsePower
     * @param string $fuelType
     */
    public function __construct(int $horsePower, string $fuelType)
    {
        $this->horsePower = $horsePower;
        $this->fuelType = $fuelType;
        $this->isStarted = false;
    }

    /**
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }
}
