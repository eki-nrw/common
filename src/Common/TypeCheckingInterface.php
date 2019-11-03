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
interface TypeCheckingInterface
{
	/**
	* Checks if type is 'thing'
	*
	* @param string $thing
	* 
	* @return bool
	*/
	public function is($thing);
	
	/**
	* Checks if type accepts 'content' of thing'
	* 
	* @param string $thing
	* @param mixed $content
	* 
	* @return bool
	*/
	public function accept($thing, $content);
}
