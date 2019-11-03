<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Relationship;

use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\AbstractRelation;
use Eki\NRW\Common\Relations\NodeInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Relationship extends AbstractRelation implements RelationshipInterface
{
	/**
	* Constructor
	* 
	* @param string $type Relationship type
	* @param string $label
	* @param mixed $value
	* 
	* @return
	*/
	public function __construct(
		$type = RelationshipInterface::RELATIONSHIP_TYPE_DUMMY, 
		$label = '', $value = null
	)
	{
		parent::__construct($type);

		$this->setLabel($label);
		$this->setValue($value);
	}

	public static function getRelationType()
	{
		return RelationInterface::RELATION_TYPE_RELATIONSHIP;
	}
	
	public function getLabel()
	{
		return $this->getParameter('label');
	}
	
	public function setLabel($label)
	{
		$this->setParameter('label', $label);
	}

	public function getValue()
	{
		return $this->getParameter('value');
	}
	
	public function setValue($value)
	{
		$this->setParameter('value', $value);
	}
	
	public function getNode()
	{
		return $this->getBase();	
	}
	
	public function setNode(NodeInterface $node = null)
	{
		$this->setBase($node);
	}

	public function getOtherNode()
	{
		$others = $this->getOthers();
		if (!empty($others))
			return $others['default'];
	}
	
	public function setOtherNode(NodeInterface $otherNode = null)
	{
		if ($otherNode === null)
			$this->setOthers([]);
		else
			$this->setOthers(array('default'=>$otherNode));
	}
	
	/**
	* @inheritdoc
	*/
	public function getObject()
	{
		if (null !== ($node = $this->getNode()) )
		{
			return $node->getObject();
		}	
	}
	
	/**
	* @inheritdoc
	*/
	public function getOtherObject()
	{
		if (null !== ($otherNode = $this->getOtherNode()) )
		{
			return $otherNode->getObject();
		}	
	}

	/**
	* @inheritdoc
	*/
	public function addOther(NodeInterface $other, $key)
	{
		throw new \BadMethodCallException("Relationship don't support addOther method.");
	}

	/**
	* @inheritdoc
	*/
	public function removeOther(NodeInterface $other)
	{
		throw new \BadMethodCallException("Relationship don't support removeOther method.");
	}
	
	/**
	* @inheritdoc
	*/
	public function removeOtherHasKey($key)
	{
		throw new \BadMethodCallException("Relationship don't support removeOtherHasKey method.");
	}
}
