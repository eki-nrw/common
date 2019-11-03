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
interface HasParametersInterface
{
	/**
	* Set a parameter
	* 
	* @param string $name Parameter name
	* @param mixed $value Parameter value
	* 
	* @return void
	* 
	* @throw \InvalidArgumentException
	*/
	public function setParameter($name, $value);
	
	/**
	* Returns the given parameter
	* 
	* @param string $name
	* @param mixed $default
	* 
	* @return mixed
	*/
	public function getParameter($name, $default = null);
	
	/**
	* Checks if there is the given parameter
	* 
	* @param string $name
	* 
	* @return bool
	*/
	public function hasParameter($name);
	
	/**
	* Sets all parameters
	* 
	* @param array $parameters
	* 
	* @return void
	*/
	public function setParameters(array $parameters);
	
	/**
	* Returns all parameters
	* 
	* @return array
	*/
	public function getParameters();
}
