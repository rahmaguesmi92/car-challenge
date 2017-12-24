<?php

namespace CarChallenge\Model\Engine;

class GasolineEngine extends AbstractEngine
{
    CONST FUEL_TYPE__GAS    = 'gas';
    const FUEL_TYPE__DIESEL = 'diesel';

    protected $fuelType;
}
