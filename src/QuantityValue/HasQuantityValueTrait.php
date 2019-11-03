<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\QuantityValue;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>s
*/
trait HasQuantityValueTrait
{
	protected $quantityValue;
	
	/**
	* Returns then quantity value
	* 
	* @return QuantityValueInterface
	*/
	public function getQuantityValue()
	{
		return $this->quantityValue;
	}
	
	/**
	* Sets quantity value
	* 
	* @param QuantityValueInterface $quantityValue
	* 
	* @return void
	*/
	public function setQuantityValue(QuantityValueInterface $quantityValue)
	{
		$this->quantityValue = $quantityValue;
	}
}
