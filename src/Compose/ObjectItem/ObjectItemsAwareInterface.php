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
interface ObjectItemsAwareInterface
{
	/**
	* Add object item to list
	* 
	* @param ObejctItemInterface $objectItem
	* @param string $key
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function addObjectItem(ObjectItemInterface $objectItem, $key);
	
	/**
	* Remove object item
	* 
	* @param ObjectItemInterface $objectItem
	* 
	* @return void 
	* @throws \RuntimeException
	*/
	public function removeObjectItem(ObjectItemInterface $objectItem);
	
	/**
	* Remove object item that has key
	* 
	* @param string $key
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function removeObjectItemByKey($key);
	
	/**
	* Gets object item that has key
	* 
	* @param string $key
	* 
	* @return ObjectItemInterface
	* @throws \InvalidArgumentException
	*/
	public function getObjectItem($key);
	
	/**
	* Checks if an object item that has key exists.
	* 
	* @param string $key
	* 
	* @return bool
	*/
	public function hasObjectItem($key);
	
	/**
	* Gets all object items
	* 
	* @return array
	*/
	public function getObjectItems();
	
	/**
	* Set all object items
	* 
	* @param array $objectItems
	* 
	* @return void
	* @throws
	*/
	public function setObjectItems(array $objectItems);
	
	/**
	* Validate object item
	* 
	* @param ObjectItemInterface $objectItem
	* 
	* @return void
	* @throws
	*/
	public function validateObjectItem(ObjectItemInterface $objectItem);
}
