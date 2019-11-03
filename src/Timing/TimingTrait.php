<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Timing;

use DateTime;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait TimingTrait
{
	private $times = [];
	
	/**
	* @inheritdoc
	*/
	public function getTime($key)
	{
		if (isset($this->times[$key]))
			return $this->times[$key];
	}
	
	/**
	* @inheritdoc
	*/
	public function setTime($time, $key)
	{
		if ($time !== null and !$time instanceof DateTime)
			throw new \InvalidArgumentException("Time must be null or instance of DateTime.");

		if ($time === null)
		{
			if (!isset($this->times[$key]))
				throw new \InvalidArgumentException("No key %key to reset time..");
			unset($this->times[$key]);
		}
		else
			$this->times[$key] = $time;	
	}

	/**
	* @inheritdoc
	*/
	public function hasTime($key)
	{
		return isset($this->times[$key]);	
	}
	
	/**
	* @inheritdoc
	*/
	public function setTimes(array $times)
	{
		$this->times = [];
		foreach($this->times as $key => $time)
		{
			$this->setTime($time, $key);			
		}
	}

	/**
	* @inheritdoc
	*/
	public function getTimes()
	{
		return $this->times;
	}

	
	/**
	* @inheritdoc
	*/
	public function resetTimes()
	{
		$this->times = [];		
	}
}
