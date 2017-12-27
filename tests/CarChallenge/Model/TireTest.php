<?php

namespace Tests\CarChallenge\Model;

use CarChallenge\Exception\SizesOfTiresNotValidException;
use CarChallenge\Model\Tire;
use PHPUnit\Framework\TestCase;

class TireTest extends TestCase
{
    public function testValidSizesOfTiresShouldBeBetween14and20Inches()
    {
        $tire = new Tire(16, 'Continental');

        $this->assertEquals(16, $tire->getSizeInInch());
        
    }

    public function testSizesOfTiresThrowsExceptionIfTireNotIn14and20Inches()
    {
        $this->expectException(SizesOfTiresNotValidException::class);
        $tire = new Tire(10, 'Continental');
        $tire->checkSizeTire();

    }
}
