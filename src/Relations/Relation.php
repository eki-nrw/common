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
class Relation extends AbstractRelation implements RelationInterface
{
	public static function getRelationType()
	{
		return RelationInterface::RELATION_TYPE_RELATION;
	}
	
	public function __construct($type = RelationInterface::TYPE_DUMMY)
	{
		parent::__construct($type);
	}

}
