<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface NodeInterface
{
	/**
	* Returns the name of node
	* 
	* @return string
	*/
	public function getName();
	
	/**
	* Returns the object attached to node
	* 
	* @return object|null
	*/
	public function getObject();
	
	/**
	* Sets object attached to node
	* 
	* @param object|mixed|null $obj
	* 
	* @return void
	*/
	public function setObject($obj);
}
