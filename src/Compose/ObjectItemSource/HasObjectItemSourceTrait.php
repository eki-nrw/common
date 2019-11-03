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
trait HasObjectItemSourceTrait
{
	/**
	* @var ObjectItemSourceInterface
	*/
	private $objectItemSource;

	/**
	* @inheritdoc
	*/	
	public function getObjectItemSource()
	{
		return $this->objectItemSource;
	}
	
	/**
	* @inheritdoc
	*/	
	public function setObjectItemSource(ObjectItemSourceInterface $objectItemSource = null)
	{
		$this->objectItemSource = $objectItemSource;
	}
}
