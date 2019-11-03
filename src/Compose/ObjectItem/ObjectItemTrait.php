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

use Eki\NRW\Common\QuantityValue\QuantityValueInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait ObjectItemTrait
{
	protected $item;
	protected $quantityValue;
	protected $specifications = [];
	protected $link;

	public function __clone()
	{
		$this->item = clone $this->item;
		$this->quantityValue = clone $this->quantityValue;
		
		if (is_object($this->link))
		{
			$this->link = clone $this->link;
		}		
	}

	/**
	* @inheritdoc
	*/
	public function getItem()
	{
		return $this->item;
	}
	
	/**
	* @inheritdoc
	*/
	public function setItem($item)
	{
		$this->validateItem($item);
		
		$this->item = $item;
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function getQuantityValue()
	{
		return $this->quantityValue;
	}
	
	/**
	* @inheritdoc
	*/
	public function setQuantityValue(QuantityValueInterface $quantityValue)
	{
		$this->quantityValue = $quantityValue;

		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function getSpecifications()
	{
		return $this->specifications;
	}
	
	/**
	* @inheritdoc
	*/
	public function setSpecifications(array $specifications = [])
	{
		$this->specifications = $specifications;

		return $this;
	}

	/**
	* @inheritdoc
	*/
	public function getLink()
	{
		return $this->link;
	}
	
	/**
	* @inheritdoc
	*/
	public function setLink($link)
	{
		$this->link = $link;

		return $this;
	}
}
