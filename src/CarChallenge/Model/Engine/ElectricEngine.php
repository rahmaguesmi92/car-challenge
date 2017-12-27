<?php

namespace CarChallenge\Model\Engine;

class ElectricEngine extends AbstractEngine
{
    /**
     * ElectricEngine constructor.
     * @param int $horsePower
     */
    public function __construct(int $horsePower)
    {
        $this->horsePower = $horsePower;
        $this->isStarted = false;
    }
}
