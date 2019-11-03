<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait NodeTrait
{
	/**
	* @var string
	*/
	protected $nodeName;

	/**
	* @var object
	*/
	protected $nodeObject;
	
	/**
	* @inheritdoc
	*/
	public function getName()
	{
		return $this->nodeName;
	}
	
	/**
	* @inheritdoc
	*/
	public function getObject()
	{
		return $this->nodeObject;
	}
	
	/**
	* @inheritdoc
	*/
	public function setObject($obj)
	{
//		if (null !== $obj and !is_object($obj))
//			throw new \InvalidArgumentException(sprintf("Parameter 'obj' must be object. Given %s.", gettype($obj)));
		
		$this->nodeObject = $obj;
		
		return $this;
	}
}
