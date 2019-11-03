<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Location;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface LevelsCoordinationInterface extends 
	CoordinationInterface
{
	const MAX_LEVELS = 16;
	const NUM_LEVELS = "num_levels";
	const INDEX_PREFIX = "level_";
	
	/**
	* Return total levels of coordinations
	* 
	* @return int
	*/
	public function getNumLevels();

	/**
	* Sets maximum levels of coordinations
	*
	* @throws \RuntimeException Only set num levels one time 
	* 
	* @return int
	*/
	public function setNumLevels($numLevels);
	
	/**
	* Return coordinate in level $level. $level must be in range [1..num_levels]
	* 
	* @param int $level
	* 
	* @throws \InvalidArgumentException 
	* 
	* @return mixed
	*/
	public function getLevelCoordinate($level);

	/**
	* Set coordinate in level $level. $level must be in range [1..num_levels]
	* 
	* @param int $level
	* @param mixed $coordinate
	* 
	* @throws \InvalidArgumentException 
	* 
	* @return void
	*/
	public function setLevelCoordinate($level, $coordinate);
}
