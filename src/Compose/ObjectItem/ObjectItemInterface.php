<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectItem;

use Eki\NRW\Common\QuantityValue\HasQuantityValueInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ObjectItemInterface extends
	HasQuantityValueInterface
{
	/**
	* Gets the linked item
	* 
	* @return mixed
	*/
	public function getItem();
	
	/**
	* Sets the linked item
	* 
	* @param mixed $item
	* 
	* @return this
	*/
	public function setItem($item);
	
	/**
	* Returns the specifications
	* 
	* @return array
	*/
	public function getSpecifications();
	
	/**
	* Sets the specifications
	* 
	* @param array $specifications
	* 
	* @return this
	*/
	public function setSpecifications(array $specifications = []);
	
	/**
	* Gets link infor.
	* 
	* @return mixed
	*/
	public function getLink();
	
	/**
	* Sets link info.
	* 
	* @param mixed $link
	* 
	* @return this
	*/
	public function setLink($link);
	
	/**
	* Validate item
	* 
	* @param mixed $item
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function validateItem($item);
}
