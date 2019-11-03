<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectItemSource;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ObjectItemSourceInterface
{
	/**
	* Returns source type
	* 
	* @return mixed
	*/
	public function getSourceType();
	
	/**
	* Sets source type
	* 
	* @param mixed $type
	* 
	* @return this
	* @throws \InvalidArgumentException Exception throws if $type is not string
	*/
	public function setSourceType($type);
	
	/**
	* Returns source object
	* 
	* @return object
	*/
	public function getSourceObject();
	
	/**
	* Sets source object
	* 
	* @param object $object
	* 
	* @return this
	* @throws \InvalidArgumentException Exception throws if $object is not object
	*/
	public function setSourceObject($object);
	
	/**
	* Returns source method
	* 
	* @return string
	*/
	public function getSourceMethod();
	
	/**
	* Sets source method
	* 
	* @param string $method
	* 
	* @return this
	* @throws \InvalidArgumentException Exception throws if $method is not string/array
	*/
	public function setSourceMethod($method);
	
	/**
	* Returnssource specifications
	* 
	* @return array
	*/
	public function getSourceSpecifications();
	
	/**
	* Sets source specifications
	* 
	* @param array $specifications
	* 
	* @return this
	*/
	public function setSourceSpecifications(array $specifications);
}
