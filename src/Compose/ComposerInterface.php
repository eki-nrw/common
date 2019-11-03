<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ComposerInterface
{
	/**
	* Compose from substance to a "composed element"
	* 
	* @param mixed $substance 
	* 
	* @return mixed
	* @throw \InvalidArgumentException Exception throws when not support
	*/
	public function compose($substance);

	/**
	* Checks if composer supports substance or not
	* 
	* @param mixed $substance
	* 
	* @return bool
	*/
	public function support($substance);
}
