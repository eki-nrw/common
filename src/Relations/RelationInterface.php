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
interface RelationInterface extends
	HasParametersInterface
{
	const RELATION_TYPE_RELATION = 'relation';
	const RELATION_TYPE_RELATIONSHIP = 'relationship';
	const RELATION_TYPE_GROUP = 'group';
	
	const TYPE_DUMMY = '';
	
	/**
	* Returns relation type
	* 
	* @return string
	*/
	public static function getRelationType();
	
	/**
	* Returns type
	* 
	* @return string
	*/
	public function getType();

	/**
	* Returns name
	* 
	* @return string
	*/
	public function getName();
	
	/**
	* Sets name
	* 
	* @param string $name
	* 
	* @return void
	*/
	public function setName($name);
	
	/**
	* Returns base node
	* 
	* @return NodeInterface
	*/
	public function getBase();
	
	/**
	* Sets base node
	* 
	* @param NodeInterface $base
	* 
	* @return void
	*/
	public function setBase(NodeInterface $base = null);
	
	/**
	* Returns all other nodes
	* 
	* @return NodeInterface[]
	*/
	public function getOthers();
	
	/**
	* Sets all other nodes
	* 
	* @param NodeInterface[] $others
	* 
	* @return void
	*/
	public function setOthers(array $others = []);
	
	/**
	* Adds an node with key
	* 
	* @param NodeInterface $other
	* @param string $key
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function addOther(NodeInterface $other, $key);
	
	/**
	* Remove existing node
	* 
	* @param NodeInterface $other
	* 
	* @return void
	* @throws \UnexpectedValueException
	*/
	public function removeOther(NodeInterface $other);
	
	/**
	* Remove node that has key
	* 
	* @param string $key
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function removeOtherByKey($key);
	
	/**
	* Gets node by key
	* 
	* @param string $key
	* 
	* @return NodeInterface
	*/
	public function getOther($key);
	
	/**
	* Checks if a node that has key exists
	* 
	* @param string $key
	* 
	* @return bool
	*/
	public function hasOther($key);
}
