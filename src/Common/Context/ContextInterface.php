<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Context;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ContextInterface
{
	/**
	* Get a parameter
	* 
	* @param string $parameterKey
	* 
	* @return mixed
	*/
	public function getParameter($parameterKey);
	
	/**
	* Checks if a parameter with key exits
	* 
	* @param string $parameterKey
	* 
	* @return bool
	*/
	public function hasParameter($parameterKey);
}
