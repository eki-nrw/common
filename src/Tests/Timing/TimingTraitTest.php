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

use Eki\NRW\Common\Timing\TimingTrait;

use PHPUnit\Framework\TestCase;

use DateTime;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class TimingTraitTest extends TestCase
{
	private function getTiming()
	{
		return $this->getMockBuilder(TimingTrait::class)->getMockForTrait();
	}
	
	public function testGetTimeNull()
	{
		$timing = $this->getTiming();
		
		$this->assertNull($timing->getTime('any key'));
	}

	public function testSetTime()
	{
		$timing = $this->getTiming();
		
		$now = new DateTime();
		$timing->setTime($now, 'time_key');
		
		$this->assertNotNull($timing->getTime('time_key'));
		$this->assertEquals($now->getTimestamp(), $timing->getTime('time_key')->getTimestamp());
	}

	public function testResetTime()
	{
		$timing = $this->getTiming();
		
		$now = new DateTime();
		$timing->setTime($now, 'time_key');
		$timing->setTime(null, 'time_key');
		
		$this->assertNull($timing->getTime('time_key'));
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
	public function testResetTimeNoKey()
	{
		$timing = $this->getTiming();
		
		$timing->setTime(null, str_shuffle('abcdef'));
	}
	
	public function testHasTime()
	{
		$timing = $this->getTiming();
		
		$now = new DateTime();
		$timing->setTime($now, 'time_key');
		
		$this->assertTrue($timing->hasTime('time_key'));
		$this->assertFalse($timing->hasTime(str_shuffle('abcdef')));
	}
	
	public function testResetAllTimes()
	{
		$timing = $this->getTiming();
		
		$now = new DateTime();
		$timing->setTime($now, 'time_key');
		$this->assertTrue($timing->hasTime('time_key'));
		
		$timing->resetTimes();
		$this->assertFalse($timing->hasTime('time_key'));
	}
}
