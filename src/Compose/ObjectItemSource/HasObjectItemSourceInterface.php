<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectItemSource;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasObjectItemSourceInterface
{
	/**
	* Gets the object item source
	* 
	* @return ObjectItemSourceInterface
	*/
	public function getObjectItemSource();
	
	/**
	* Sets the object item source
	* 
	* @param ObjectItemSourceInterface $objectItemSource
	* 
	* @return void
	*/
	public function setObjectItemSource(ObjectItemSourceInterface $objectItemSource = null);
}
