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
interface QuantityValueInterface
{
	public function getQuantity();
	public function setQuantity($quantity);
	
	public function getUnitAlias();
	public function setUnitAlias($unitAlias);
	
	public function fromHash($hash);
	public function toHash();
	
	public function __toString();
	public function isEmpty();	
}
