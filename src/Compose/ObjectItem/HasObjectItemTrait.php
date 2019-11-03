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
trait HasObjectItemTrait
{
	private $objectItem;
	
	/**
	* @inheritdoc
	*/
	public function getObjectItem()
	{
		return $this->objectItem;
	}
	
	/**
	* @inheritdoc
	*/
	public function setObjectItem(ObjectItemInterface $objectItem = null)
	{
		$this->validateObjectItem($objectItem);
		
		$this->objectItem = $objectItem;
		
		return $this;
	}
}
