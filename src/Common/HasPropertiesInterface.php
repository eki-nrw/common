<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasPropertiesInterface
{
	/**
	* Gets all properties
	* 
	* @return array
	*/
	public function getProperties();
	
	/**
	* Gets a property by name
	* 
	* @param string $propName
	* 
	* @return mixed|null
	*/
	public function getProperty($propName);

	/**
	* Checks if there is a property with name $propName
	* 
	* @param string $propName
	* 
	* @return bool
	*/
	public function hasProperty($propName);

	/**
	* Sets a property
	* 
	* @param string $propName
	* @param mixed|null $propValue
	* 
	* @return void
	*/		
	public function setProperty($propName, $propValue);
	
	/**
	* Sets all properties
	* 
	* @param array $properties
	* 
	* @return void
	*/
	public function setProperties(array $properties);
}
