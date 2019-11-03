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
use Eki\NRW\Common\Relations\NodeInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface RelationshipInterface extends
	RelationInterface
{
	const RELATIONSHIP_TYPE_DUMMY = 'relationship';
	const RELATIONSHIP_TYPE_CHAIN = 'chain';
	
	public function getLabel();
	public function setLabel($label);
	
	public function getValue();
	public function setValue($value);
	
	public function getNode();
	public function setNode(NodeInterface $node = null);

	public function getOtherNode();
	public function setOtherNode(NodeInterface $otherNode = null);
	
	public function getObject();
	public function getOtherObject();
}
