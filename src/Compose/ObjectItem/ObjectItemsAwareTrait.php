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

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait ObjectItemsAwareTrait
{
	protected $objectItems = [];
	
	/**
	* @inheritdoc
	*/
	public function addObjectItem(ObjectItemInterface $objectItem, $key)
	{
		$this->validateObjectItem($objectItem);
		
		if ($key === null)
			throw new \InvalidArgumentException("key parameter cannot be null on addObjectItem method.");
			
		if (isset($this->objectItems[$key]))
			throw new \InvalidArgumentException(sprintf("Object item with key %s already exists.", $key));
			
		$this->objectItems[$key] = $objectItem;
	}
	
	/**
	* @inheritdoc
	*/
	public function removeObjectItem(ObjectItemInterface $objectItem)
	{
		foreach($this->objectItems as $findKey => $findObjectItem)
		{
			if ($findObjectItem === $objectItem)
			{
				unset($this->objectItems[$findKey]);
				return;
			}
		}
		
		throw new \RuntimeException('No object item matched to remove');
	}
	
	/**
	* @inheritdoc
	*/
	public function removeObjectItemByKey($key)
	{
		if (!isset($this->objectItems[$key]))
			throw new InvalidArgumentException(sprintf('No object item has key %s to remove.', $key));
			
		unset($this->objectItems[$key]);
	}

	/**
	* @inheritdoc
	*/
	public function getObjectItem($key)
	{
		if (!isset($this->objectItems[$key]))
			throw new \InvalidArgumentException(sprintf('No object item has key %s to get.', $key));
			
		return $this->objectItems[$key];
	}
	
	/**
	* @inheritdoc
	*/
	public function hasObjectItem($key)
	{
		return isset($this->objectItems[$key]);
	}
	
	/**
	* @inheritdoc
	*/
	public function getObjectItems()
	{
		return $this->objectItems;
	}
	
	/**
	* @inheritdoc
	*/
	public function setObjectItems(array $objectItems)
	{
		$this->objectItems = [];
		
		foreach($objectItems as $key => $objectItem)
		{
			$this->addObjectItem($objectItem, $key);
		}
	}
}
