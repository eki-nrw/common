<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Group;

use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\AbstractRelation;
use Eki\NRW\Common\Relations\NodeInterface;

/**
* Group of others that has a base node
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Group extends AbstractRelation implements GroupInterface
{
	public function __construct($type = GroupInterface::GROUP_TYPE_DUMMY)
	{
		parent::__construct($type);
	}
	
	public static function getRelationType()
	{
		return RelationInterface::RELATION_TYPE_GROUP;
	}

	/**
	* @inheritdoc
	*/
	public function getGroup()
	{
		return $this->getBase();	
	}
	
	/**
	* @inheritdoc
	*/
	public function setGroup(NodeInterface $node)
	{
		$this->setBase($node);
	}

	/**
	* @inheritdoc
	*/
	public function getMembers()
	{
		return $this->getOthers();
	}
	
	/**
	* @inheritdoc
	*/
	public function getMember($key)
	{
		return $this->getOther($key);
	}	

	/**
	* @inheritdoc
	*/
	public function hasMember($key)
	{
		return $this->hasOther($key);
	}	
	
	/**
	* @inheritdoc
	*/
	public function addMember(NodeInterface $node, $key)
	{
		return $this->addOther($node, $key);
	}
	
	/**
	* @inheritdoc
	*/
	public function removeMember(NodeInterface $node)
	{
		return $this->removeOther($node);
	}	

	/**
	* @inheritdoc
	*/
	public function removeMemberByKey($key)
	{
		return $this->removeOtherByKey($key);
	}
}
