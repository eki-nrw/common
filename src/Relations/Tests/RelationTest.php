<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Tests;

use Eki\NRW\Common\Relations\Relation;
use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\Node;

use PHPUnit\Framework\TestCase;

class RelationTest extends TestCase
{
	public function testDefaults()
	{
		$relation = new Relation();
		
		$this->assertSame($relation->getRelationType(), RelationInterface::RELATION_TYPE_RELATION);
		$this->assertSame($relation->getType(), RelationInterface::TYPE_DUMMY);
	}

	public function testWithAType()
	{
		$relation = new Relation('a_type');
		
		$this->assertSame($relation->getType(), 'a_type');
	}
}
