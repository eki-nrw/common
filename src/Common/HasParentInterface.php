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
interface HasParentInterface
{
	/**
	* Returns parent 
	* 
	* @return mixed
	*/
	public function getParent();
	
	/**
	* Sets parent
	* 
	* @param mixed $parent
	* 
	* @return void
	*/
	public function setParent($parent);
}
