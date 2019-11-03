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
interface ObjectStatesInterface
{
	/**
	* Get current states of a given definition
	* 
	* @param string $definitionName Name of state group
	* 
	* @return mixed
	*/
	public function getCurrentStates($definitionName);
	
	/**
	* Set current states for state group
	* 
	* @param string $definitionName|null Name of state group
	* @param mixed $currentStatus
	* 
	* @return void
	*/
	public function setCurrentStates($definitionName, $currentStatus = null);
	
	/**
	* Check a state of the given status
	* 
	* @param string $definitionName
	* @param string $stateName
	* 
	* @return bool
	*/	
	public function isCurrentState($definitionName, $stateName);

	/**
	* Set the state of the given status
	* 
	* @param string $definitionName
	* @param string $stateName
	* @param mixed $stateValue
	* 
	* @return void
	*/	
	public function setCurrentState($definitionName, $stateName, $stateValue);
}
