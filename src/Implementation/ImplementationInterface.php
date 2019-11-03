<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Implementation;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ImplementationInterface
{
	/**
	* Returns engine type of implementation
	* 
	* @param string $engineType
	* 
	* @return void
	*/
	public function getEngineType($type);

	/**
	* Returns implementation type
	* 
	* @return string
	*/	
	public function getType();
	
	/**
	* Returns definition to implement
	* 
	* @return string
	* @throws
	*/
	public function getDefinition();
}
