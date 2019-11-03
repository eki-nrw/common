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
class Location implements LocationInterface
{
	use
		HasCoordinatesTrait
	;
	
	/**
	* @var string
	*/
	protected $locationName;
	
	/**
	* @var string
	*/
	protected $locationType;
	
	/**
	* Constructor
	* 
	* @param string $locationName
	* @param string|null $locationType
	* @param array|CoordinationInterface $coordinates
	* 
	* @return
	*/
	public function __construct($locationName = "", $locationType = null, $coordinates = null)
	{
		$this->locationName = $locationName;
		$this->locationType = $locationType;
		
		if ($coordinates === null)
			$coordinates = [];
		else if ($coordinates instanceof CoordinationInterface)
			$coordinates = $coordinates->__toArray();
		else if (!is_array($coordinates))
		{
			throw new \InvalidArgumentException(sprintf("Parameter 'coordinates' must be array or instance object of %s.", CoordinationInterface::class));
		}
		
		$this->setCoordinates($coordinates);
	}

	/**
	* @inheritdoc
	*/
	public function getLocationName()
	{
		return $this->locationName;
	}
	
	/**
	* @inheritdoc
	*/
	public function setLocationName($name)
	{
		$this->locationName = $name;
	}

	/**
	* Returns locaiton type
	* 
	* @return string
	*/
	public function getLocationType()
	{
		return $this->locationType;
	}
	
	/**
	* Sets locaiton type
	* 
	* @param string $locationType
	* 
	* @return void
	*/
	public function setLocationType($locationType)
	{
		$this->locationType = $locationType;
	}
}
