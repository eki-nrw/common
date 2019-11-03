<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Manager;

use Eki\NRW\Common\Relations\RelationInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface RelationManagerInterface
{
	/**
	* Create a new relation
	* 
	* @param string $type Composed type
	* 
	* @return RelationInterface
	*/
	public function create($type);
	
	/**
	* Link new relation to components 
	* 
	* @param RelationInterface $relation
	* @param NodeInterface|object $base
	* @param array(NodeInterface|object) $others
	* 
	* @return RelationInterface
	* @throws
	*/
	public function link(RelationInterface $relation, $base, array $others);
	
	/**
	* Unlink a relation
	* 
	* @param RelationInterface $relation
	* 
	* @return void
	* @throws
	*/
	public function unlink(RelationInterface $relation);
	
	/**
	* Finds all relations that match filters
	*  
	* @param array $filters
	* @param string $relationType 
	* 
	* Filters index as follows:
	* + 'relation_type'
	* + 'type'
	* + 'base': base object
	* + 'base_name': name of base node
	* + 'other': the first object of others
	* + 'other_name': the name of the first node of others
	* + 'other_key': the other object with key
	* + More in inheritance
	* 
	* @return RelationInterface[]
     * @throws \UnexpectedValueException
     * @throws \InvalidArgumentException
	*/
	public function find(array $filters = [], $relationType = null);

	/**
	* Find one
	* 
	* @param array $filters
	* @param string $relationType
	* 
	* @return RelationInterface
     * @throws \UnexpectedValueException
     * @throws \InvalidArgumentException
	*/
	public function findOne(array $filters = [], $relationType = null);
}
