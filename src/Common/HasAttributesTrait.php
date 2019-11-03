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
trait HasAttributesTrait
{
	protected $attributes = [];
	
	public function getAttributes()
	{
		return $this->attributes;
	}
	
	public function getAttribute($attrName)
	{
		if (isset($this->attributes[$attrName]))
			return $this->attributes[$attrName];
	}

	public function hasAttribute($attrName)
	{
		return isset($this->attributes[$attrName]);
	}
	
	public function setAttribute($attrName, $attrValue)
	{
		if (null !== $attrValue)
			$this->attributes[$attrName] = $attrValue;
		else
			unset($this->attributes[$attrName]);
	}
	
	public function setAttributes(array $attributes)
	{
		$this->attributes = [];
		foreach($attributes as $attrName => $attrValue)
		{
			$this->setAttribute($attrName, $attrValue);
		}
	}
}
