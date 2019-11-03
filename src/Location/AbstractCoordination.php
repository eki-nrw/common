<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Location;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractCoordination implements CoordinationInterface
{
	use 
		CoordinationTrait
	;
	
	/**
	* Constructor
	* 
	* @param string $type
	* @param array $coordinates
	* 
	* @throws \InvalidArgumentException
	*/
	public function __construct($type, array $coordinates = [])
	{
		$this->setCoordinates(array('type' => $type) + $coordinates);
	}

	/**
	* Return type of coordination
	* 
	* @return string
	*/
	public function getType()
	{
		if (isset($this->coordinates['type']))
			return $this->coordinates['type'];
	}
}
