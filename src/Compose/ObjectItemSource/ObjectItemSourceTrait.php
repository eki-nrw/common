<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectItemSource;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait ObjectItemSourceTrait
{
	protected $objectItemSourceType;
	protected $objectItemSourceObject;
	protected $objectItemSourceMethod;
	protected $objectItemSourceSpecifications = [];
	
	/**
	* @inheritdoc
	*/
	public function getSourceType()
	{
		return $this->objectItemSourceType;
	}
	
	/**
	* @inheritdoc
	*/
	public function setSourceType($type)
	{
		if (!is_string($type))
			throw new \InvalidArgumentException(sprintf("Type of source must be string. Given %s.", gettype($type)));
		
		$this->objectItemSourceType = $type;
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function getSourceObject()
	{
		return $this->objectItemSourceObject;
	}
	
	/**
	* @inheritdoc
	*/
	public function setSourceObject($object)
	{
		if (!is_object($object))
			throw new \InvalidArgumentException(sprintf("Object of source must be object type. Given %s.", gettype($object)));

		$this->objectItemSourceObject = $object;
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function getSourceMethod()
	{
		return $this->objectItemSourceMethod;
	}
	
	/**
	* @inheritdoc
	*/
	public function setSourceMethod($method)
	{
		if (!is_string($method))
			throw new \InvalidArgumentException(sprintf("Method of source must be string. Given %s.", gettype($method)));

		$this->objectItemSourceMethod = $method;

		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function getSourceSpecifications()
	{
		return $this->objectItemSourceSpecifications;
	}
	
	/**
	* @inheritdoc
	*/
	public function setSourceSpecifications(array $specifications)
	{
		$this->objectItemSourceSpecifications = $specifications;

		return $this;
	}
}
