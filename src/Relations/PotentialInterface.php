<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface PotentialInterface
{
	const POTENTIAL_DEFAULT_MIN = 0;
	const POTENTIAL_DEFAULT_MAX = 3;
	const POTENTIAL_DEFAULT_FIRST = self::POTENTIAL_DEFAULT_MIN;
	
	/**
	* Sets active for potential
	* 
	* @param bool $active
	* 
	* @return this
	*/
	public function setActive($active = true);
	
	/**
	* Checks if potential is active
	* 
	* @return bool
	*/
	public function isActive();
	
	/**
	* Sets potential level
	* 
	* @param int $potentialLevel
	* 
	* @return this
	* @throws \OutOfRangeException $potentialLevel is out of range [minPotential, maxPotential]
	* @throws \InvalidArgumentException $potentialLevel is not integer
	*/
	public function setPotential($potentialLevel);
	
	/**
	* @return potential level
	* 
	* @return int
	*/
	public function getPotential();
	
	/**
	* Checks if potential level is minimum
	* 
	* @return bool
	*/
	public function isPotentialMin();
	
	/**
	* Checks if potential level is maximum
	* 
	* @return bool
	*/
	public function isPotentialMax();
}
