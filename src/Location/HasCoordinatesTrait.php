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
trait HasCoordinatesTrait
{
	/**
	* @var array
	*/
	protected $coordinates = [];
	
	/**
	* @inheritdoc
	* 
	*/
	public function getCoordinates()
	{
		return $this->coordinates;
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getCoordinate($key)
	{
		if (isset($this->coordinates[$key]))
			return $this->coordinates[$key];
	}

	/**
	* @inheritdoc
	* 
	*/
	public function hasCoordinate($key)
	{
		return isset($this->coordinates[$key]);
	}

	/**
	* @inheritdoc
	* 
	*/
	public function setCoordinates(array $coordinates)
	{
		$this->coordinates = $coordinates;
	}

	/**
	* @inheritdoc
	* 
	*/
	public function setCoordinate($key, $cooridinate)
	{
		$this->coordinates[$key] = $coordinate;	
	}
}
