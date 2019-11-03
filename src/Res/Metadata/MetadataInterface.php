<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Metadata;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface MetadataInterface
{
	/**
	* Returns the alias of metadata
	* 
	* @return string
	*/	
	public function getAlias();

	/**
	* Gets the given parameter 
	* 
	* @param string $name
	* 
	* @return mixed
	*/	
	public function getParameter($name);

	/**
	* Returns All parameters
	* 
	* @return array
	*/
	public function getParameters();
	
	/**
	* Checks if there is the given parameter
	* 
	* @return bool
	*/
	public function hasParameter($name);

	/**
	* Returns the given class
	* 
	* @param string|null $name Null if default class
	* 
	* @return string
	*/
	public function getClass($name = null);

	/**
	* Returns the all classes
	* 
	* @return string[]
	*/
	public function getClasses();
	
	/**
	* Checks if there is the given class
	* 
	* @param string $name
	* 
	* @return bool
	*/
	public function hasClass($name);
}
