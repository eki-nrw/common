<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait HasPropertiesTrait
{
	protected $properties = [];
	
	public function getProperties()
	{
		return $this->properties;
	}
	
	public function getProperty($propName)
	{
		if (isset($this->properties[$propName]))
			return $this->properties[$propName];
	}

	public function hasProperty($propName)
	{
		return isset($this->properties[$propName]);
	}
	
	public function setProperty($propName, $propValue)
	{
		if (null !== $propValue)
			$this->properties[$propName] = $propValue;
		else
		{
			unset($this->properties[$propName]);
		}
	}
	
	public function setProperties(array $properties)
	{
		$this->properties = [];
		foreach($properties as $propName => $propValue)
		{
			$this->setProperty($propName, $propValue);
		}
	}
}
