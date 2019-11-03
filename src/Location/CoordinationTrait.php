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
trait CoordinationTrait
{
	/**
	* @var array(numeric)
	*/
	private $coordinates = [];
	
	/**
	* @inheritdoc
	*/
	public function getCoordinates()
	{
		return $this->coordinates;
	}
	
	/**
	* @inheritdoc
	*/
	public function getCoordinate($key)
	{
		if (isset($this->coordinates[$key]))
			return $this->coordinates[$key];
	}

	/**
	* @inheritdoc
	*/
	public function hasCoordinate($key)
	{
		return isset($this->coordinates[$key]);
	}
	
	/**
	* @inheritdoc
	*/
	public function setCoordinates(array $coordinates = [])
	{
		$this->coordinates = [];
		foreach($coordinates as $key => $coordinate)
		{
			$this->setCoordinate($key, $coordinate);
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function setCoordinate($key, $coordinate)
	{
		$this->validateCoordinate($key, $coordinate);
			
		$this->coordinates[$key] = $coordinate;
	}

	/**
	* @inheritdoc
	*/
	public function __toArray()
	{
		return $this->coordinates;
	}
}
