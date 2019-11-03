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
interface LocationInterface extends 
	HasCoordinatesInterface
{
	/**
	* Returns location name
	* 
	* @return string
	*/
	public function getLocationName();
	
	/**
	* Sets location name
	* 
	* @param string $name
	* 
	* @return void
	*/
	public function setLocationName($name);
	
	/**
	* Returns locaiton type
	* 
	* @return string
	*/
	public function getLocationType();
	
	/**
	* Sets locaiton type
	* 
	* @param string $locationType
	* 
	* @return void
	*/
	public function setLocationType($locationType);
}
