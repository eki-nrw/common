<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectMarking;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait ObjectMarkingTrait
{
	public $markings = [];
	
	/**
	* @inheritdoc
	* 
	*/
	public function getMarking($definitionName)
	{
		if (isset($this->markings[$definitionName]))
			return $this->markings[$definitionName];
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setMarking($definitionName, $marking = null)
	{
		if (isset($this->markings[$definitionName]) and $marking === null)
		{
			unset($this->markings[$definitionName]);
			return;
		}

		$this->markings[$definitionName] = $marking;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getMarkings()
	{
		return $this->markings;		
	}
}
