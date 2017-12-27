<?php

namespace CarChallenge\Model;

class Wheel
{
    /**
     * @var Tire 
     */
    protected $tire;

    public function __construct(Tire $tire)
    {
        $this->tire = $tire;
    }
}
