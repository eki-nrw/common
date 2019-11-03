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
use Eki\NRW\Common\Relations\NodeInterface;

/**
* Linkage of nodes that has a base node
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface GroupInterface extends
	RelationInterface
{
	const GROUP_TYPE_DUMMY = '';

	/**
	* Get group node
	* 
	* @return NodeInterface
	*/
	public function getGroup();
	
	/**
	* Sets node as group
	* 
	* @param NodeInterface $node
	* 
	* @return void
	*/
	public function setGroup(NodeInterface $node);
	
	/**
	* Get all node links of the linkage
	* 
	* @return array
	*/
	public function getMembers();
	
	/**
	* Get appropriate node with key
	* 
	* @param mixed $key
	* 
	* @return NoteInterface
	*/
	public function getMember($key);
	
	/**
	* Checks if 
	* 
	* @param string $key
	* 
	* @return bool
	*/
	public function hasMember($key);
	
	/**
	* Add a member
	* 
	* @param NodeInterface $node
	* @param string $key
	* 
	* @return void
	* @throws
	*/
	public function addMember(NodeInterface $node, $key);
	
	/**
	* Remove a member from group
	* 
	* @param NodeInterface $node
	* 
	* @return void
	*/
	public function removeMember(NodeInterface $node);

	/**
	* Remove member by key
	* 
	* @param string $key
	* 
	* @return void
	* @throws
	*/
	public function removeMemberByKey($key);
}
