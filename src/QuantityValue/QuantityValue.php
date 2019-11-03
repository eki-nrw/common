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
class QuantityValue implements QuantityValueInterface
{
	protected $quantity;
	protected $unitAlias;
	
	public function __construct($quantity = 0, $unit = '')
	{
		$this->fromHash(array('quantity' => $quantity, 'unit_alias' => $unit));
	}
	
	public function getQuantity()
	{
		return $this->quantity;
	}
	
	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}
	
	public function getUnitAlias()
	{
		return $this->unitAlias;
	}
	
	public function setUnitAlias($unitAlias)
	{
		$this->unitAlias = $unitAlias;
	}
	
	public function fromHash($hash)
	{
		if (isset($hash['quantity']))
			$this->quantity = $hash['quantity'];
		if (isset($hash['unit_alias']))
			$this->unitAlias = $hash['unit_alias'];
		if (isset($hash['unit']))
			$this->unitAlias = $hash['unit'];
	}
	
	public function toHash()
	{
		return array(
			'quantity' => $this->getQuantity,
			'unit' => $this->unitAlias,
		);
	}
	
	public function __toString()
	{
		return $this->quantity . ' ' . $this->unitAlias;
	}

	public function isEmpty()
	{
		return empty($this->quantity) && empty($this->unitAlias);
	}
	
}
