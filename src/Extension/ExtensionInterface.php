<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Extension;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ExtensionInterface
{
	/**
	* Returns extension name
	* 
	* @return string
	*/
	public function getExtensionName();
	
	/**
	* Checks if support for subject
	* 
	* @param object $subject
	* @param string|null $position 
	* 
	* @return bool
	*/
	public function support($subject, $position = null);
	
	/**
	* Apply to subject
	* 
	* @param object $subject
	* @param string $position
	* @param array $contexts
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function apply($subject, $position, array $contexts = []);
}
