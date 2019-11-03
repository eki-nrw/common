<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectStates;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait ObjectStatesTrait
{
	public $currentStates = [];

	/**
	* @inheritdoc
	* 
	*/	
	public function getCurrentStates($definitionName)
	{
		if (isset($this->currentStates[$definitionName]))
			return $this->currentStates[$definitionName];
	}
	
	/**
	* @inheritdoc
	* 
	*/	
	public function setCurrentStates($definitionName, $currentStates = null)
	{
		if (isset($this->currentStates[$definitionName]) and $currentStates === null)
		{
			unset($this->currentStatuses[$definitionName]);
			return;
		}

		$this->currentStatuses[$definitionName] = $currentStates;
	}

	/**
	* @inheritdoc
	* 
	*/	
	public function isCurrentState($definitionName, $stateName)
	{
		throw new \BadMethodCallException("Method ".__METHOD__." is not implemented.");
	}

	/**
	* @inheritdoc
	* 
	*/	
	public function setCurrentState($definitionName, $stateName, $stateValue)
	{
		throw new \BadMethodCallException("Method ".__METHOD__." is not implemented.");
	}
}
