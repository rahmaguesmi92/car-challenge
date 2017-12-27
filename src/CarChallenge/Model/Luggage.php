<?php

namespace CarChallenge\Model;

class Luggage
{
    /**
     * @var int 
     */
    protected $weight;

    /**
     * Luggage constructor.
     * @param int $weight
     */
    public function __construct(int $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }
}
