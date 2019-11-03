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
class GeographicalCoordination extends Coordination implements GeographicalCoordinationInterface
{
	public function __construct($longitude = 0, $latitude = 0, CoordinateValidatorInterface $validator = null)
	{
		parent::__construct(
			CoordinationTypes::TYPE_GEOGRAPHIC,
			array(
				GeographicalCoordinationInterface::GEOGRAPHIC_LONGITUDE_KEY => $longitude,
				GeographicalCoordinationInterface::GEOGRAPHIC_LATITUDE_KEY => $latitude
			),
			$validator
		);
	}

	/**
	* @inheritdoc
	*/
	public function getLongitude()
	{
		return $this->getCoordinate(GeographicalCoordinationInterface::GEOGRAPHIC_LONGITUDE_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setLongitude($longitude)
	{
		$this->setCoordinate(GeographicalCoordinationInterface::GEOGRAPHIC_LONGITUDE_KEY, $longitude);
	}

	/**
	* @inheritdoc
	*/
	public function getLatitude()
	{
		return $this->getCoordinate(GeographicalCoordinationInterface::GEOGRAPHIC_LATITUDE_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setLatitude($latitude)
	{
		$this->setCoordinate(GeographicalCoordinationInterface::GEOGRAPHIC_LATITUDE_KEY, $latitude);
	}
}
