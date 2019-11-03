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
trait RelationTrait
{
	/**
	* @var string
	*/
	protected $name;
	
	/**
	* @var string
	*/
	protected $type;
	
	/**
	* @var NodeInterface
	*/
	protected $base;
	
	/**
	* @var NodeInterface[]
	*/
	protected $others = [];
	
	/**
	* @inheritdoc
	*/
	public function getType()
	{
		return $this->type;
	}	
	
	/**
	* @inheritdoc
	*/
	public function getName()
	{
		return $this->name;
	}
	
	/**
	* @inheritdoc
	*/
	public function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	* @inheritdoc
	*/
	public function getBase()
	{
		return $this->base;
	}
	
	/**
	* @inheritdoc
	*/
	public function setBase(NodeInterface $base = null)
	{
		$this->base = $base;
	}
	
	/**
	* @inheritdoc
	*/
	public function getOthers()
	{
		return $this->others;
	}
	
	/**
	* @inheritdoc
	*/
	public function setOthers(array $others = [])
	{
		foreach($others as $key => $node)
		{
			if (!$node instanceof NodeInterface)
			{
				throw new \InvalidArgumentException(sprintf("Node of key $key must be instance of %s.", NodeInterface::class));
			}
		}
		
		$this->others = $others;
	}

	/**
	* @inheritdoc
	*/
	public function getOther($key)
	{
		if (isset($this->others[$key]))
			return $this->others[$key];
	}

	/**
	* @inheritdoc
	*/
	public function addOther(NodeInterface $other, $key)
	{
		if ($this->hasOther($key))
			throw new \InvalidArgumentException("Already other node with key $key");
		foreach($this->others as $traceKey => $obj)
		{
			if ($obj === $other)
				throw new \InvalidArgumentException("Already other node that has the same object at key $traceKey.");
		}
			
		$this->others[$key] = $other;		
	}

	/**
	* @inheritdoc
	*/
	public function removeOther(NodeInterface $other)
	{
		$tagKey = null;
		foreach($this->others as $findKey => $findOther)
		{
			if ($other === $findOther)
			{
				$tagKey = $findKey;
				break;
			}
		}
		
		if ($tagKey === null)
			throw new \UnexpectedValueException("Other node is not in others nodes.");
			
		$this->removeOtherByKey($tagKey);
	}

	/**
	* @inheritdoc
	*/
	public function removeOtherByKey($key)
	{
		if (!isset($this->others[$key]))
			throw new \InvalidArgumentException("No key $key exists.");
			
		unset($this->others[$key]);
	}
	
	/**
	* @inheritdoc
	*/
	public function hasOther($key)
	{
		return isset($this->others[$key]);
	}
}
