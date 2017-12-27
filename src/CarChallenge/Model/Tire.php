<?php

namespace CarChallenge\Model;

use CarChallenge\Exception\SizesOfTiresNotValidException;

class Tire
{
    /**
     * @var int
     */
    protected $sizeInInch;

    /**
     * @var string
     */
    protected $name;

    /**
     * Tire constructor.
     * @param int $sizeInInch
     * @param string $name
     */
    public function __construct(int $sizeInInch, string $name)
    {
        $this->sizeInInch = $sizeInInch;
        $this->name = $name;
    }

    public function checkSizeTire(): int
    {
        if (!in_array($this->sizeInInch, range(14, 20))) {
            throw new SizesOfTiresNotValidException();
        }
        return $this->sizeInInch;
    }

    /**
     * @return int
     */
    public function getSizeInInch(): int
    {
        return $this->sizeInInch;
    }

    /**
     * @param int $sizeInInch
     */
    public function setSizeInInch(int $sizeInInch): void
    {
        $this->sizeInInch = $sizeInInch;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
