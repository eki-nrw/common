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
interface RegistryInterface
{
	/**
	* Get type string
	* 
	* @return string
	*/
	public function getType();
	
	/**
	* Returns full qualified class name
	* 
	* @return string
	*/
	public function getClassname();
}
