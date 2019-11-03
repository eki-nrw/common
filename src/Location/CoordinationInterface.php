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
interface CoordinationInterface
{
	/**
	* Return type of coordination
	* 
	* @return string
	*/
	public function getType();
	
	/**
	* Returns coordinates
	* 
	* @return array
	*/
	public function getCoordinates();
	
	/**
	* Return a coordinate
	* 
	* @param string $key
	* 
	* @return mixed (numeric)
	*/
	public function getCoordinate($key);

	/**
	* Check if there is the given coordinate
	* 
	* @param string $key
	* 
	* @return bool
	*/
	public function hasCoordinate($key);
	
	/**
	* Sets coordinates
	* 
	* @param array $coordinates
	* 
	* @return void
	* @throws
	*/
	public function setCoordinates(array $coordinates = []);
	
	/**
	* Sets a coordinate
	* 
	* @param string $key
	* @param mixed (numeric) $coordinate
	* 
	* @return void
	* @throws
	*/
	public function setCoordinate($key, $coordinate);
	
	/**
	* Returns coordination in array
	* 
	* @return array
	*/
	public function __toArray();
}
