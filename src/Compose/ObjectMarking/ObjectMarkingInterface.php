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
interface ObjectMarkingInterface
{
	/**
	* Get marking
	* 
	* @param string $definitionName Name of definition
	* 
	* @return mixed
	*/
	public function getMarking($definitionName);
	
	/**
	* Set current state for state group
	* 
	* @param string $definitionName Name of definition
	* @param mixed|null $marking
	* 
	* @return void
	*/
	public function setMarking($definitionName, $marking = null);

	/**
	* Get all markings
	* 
	* @return mixed[]
	*/	
	public function getMarkings();
}
