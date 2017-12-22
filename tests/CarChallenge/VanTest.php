<?php

namespace Tests\CarChallenge;

use CarChallenge\Exception\NoEngineException;
use CarChallenge\Model\Van;
use PHPUnit\Framework\TestCase;

class VanTest extends TestCase
{
    public function testStartEngineFailsWithoutEngine()
    {
        $this->expectException(NoEngineException::class);

        $van = new Van();
        $van->startEngine();
    }
}
