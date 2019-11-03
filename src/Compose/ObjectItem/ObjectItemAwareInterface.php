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
interface ObjectItemAwareInterface
{
	/**
	* Set object item
	* 
	* @param ObjectItemInterface $objectItem
	* 
	* @return void
	*/
	public function setObjectItem(ObjectItemInterface $objectItem = null);
}
