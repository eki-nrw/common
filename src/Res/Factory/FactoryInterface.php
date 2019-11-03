<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Factory;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface FactoryInterface
{
	/**
	* Create a new object 
	* 
	* @param mixed|null $type
	* @param array|null $args Arguments to create new instance
	*  
	* @return object
	* @throws \InvalidArgumentException
	*/
	public function createNew($type = null, $args = null);
	
	/**
	* Checks if type is supported
	* 
	* @param mixed $type
	* 
	* @return bool
	*/
	public function support($type);
	
	/**
	* Extract a new factory that support specified types
	* 
	* @param array $types
	* 
	* @return FactoryInterface
	*/
	public function extractFactory(array $types);
}
