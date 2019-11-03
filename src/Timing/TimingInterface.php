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

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface TimingInterface
{
	/**
	* Gets a time of key
	* 
	* @param string $key
	* 
	* @return DateTime|null
	*/
	public function getTime($key);
	
	/**
	* Sets time of key
	* 
	* @param DateTime|null $time
	* @param string $key
	* 
	* @return this
	* @throws \InvalideArgumentException
	*/
	public function setTime($time, $key);
	
	/**
	* Checks if time with key that is not null
	* 
	* @param string $key
	* 
	* @return bool
	*/
	public function hasTime($key);
	
	/**
	* Sets all time
	* 
	* @param array $times
	* 
	* @return this
	* @throws \InvalideArgumentException
	*/
	public function setTimes(array $times);
	
	/**
	* Get all times
	* 
	* @return array
	*/
	public function getTimes();
	
	/**
	* Reset all times
	* 
	* @return void
	*/
	public function resetTimes();
}
