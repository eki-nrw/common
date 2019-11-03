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
interface HasCoordinatesInterface
{
	/**
	* Returns coordinates
	* 
	* @return array
	*/
	public function getCoordinates();

	/**
	* Returns a coordinate
	* 
	* @param $key
	* 
	* @return mixed
	*/
	public function getCoordinate($key);

	/**
	* Check if there is a coordinate
	* 
	* @param $key
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
	*/	
	public function setCoordinates(array $coordinates);
	
	/**
	* Sets an coordinate
	* 
	* @param string $key
	* @param mixed $cooridinate
	* 
	* @return void
	*/
	public function setCoordinate($key, $cooridinate);
}
