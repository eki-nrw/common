<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Timing;

use Eki\NRW\Common\Timing\StartEndTimeTrait;

use PHPUnit\Framework\TestCase;

use DateTime;

class StartEndTimeTraitTest extends TestCase
{
    public function testDefault()
    {
		$time = $this->getMockBuilder(StartEndTimeTrait::class)->getMockForTrait();
		
		$this->assertNull($time->getStartDate());
		$this->assertNull($time->getEndDate());
    }

    public function testStartDate()
    {
		$time = $this->getMockBuilder(StartEndTimeTrait::class)->getMockForTrait();
		
		$now = new DateTime();
		$time->setStartDate($now);
		
		$this->assertEquals($now->getTimestamp(), $time->getStartDate()->getTimestamp());				
    }

    public function testEndDate()
    {
		$time = $this->getMockBuilder(StartEndTimeTrait::class)->getMockForTrait();
		
		$now = new DateTime();
		$time->setEndDate($now);
		
		$this->assertEquals($now->getTimestamp(), $time->getEndDate()->getTimestamp());				
    }
    
    public function testValidTime()
    {
		$time = $this->getMockBuilder(StartEndTimeTrait::class)->getMockForTrait();

		$time->setStartDate(new DateTime());		
		$time->setEndDate(new DateTime());		
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testInvalidTime()
    {
		$time = $this->getMockBuilder(StartEndTimeTrait::class)->getMockForTrait();

		$time->setEndDate(new DateTime());		
		$time->setStartDate(new DateTime("+1"));		
	}
}
