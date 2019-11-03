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

use Eki\NRW\Common\Relations\AbstractRelation;

use PHPUnit\Framework\TestCase;

class AbstractRelationTest extends TestCase
{
    public function testType()
    {
		$relation = $this->getMockBuilder(AbstractRelation::class)
             ->setConstructorArgs(array('a_type'))
             ->getMockForAbstractClass()
    	;
    	
    	$this->assertSame($relation->getType(), 'a_type');
    }

    public function testTypeChain()
    {
		$relation = $this->getMockBuilder(AbstractRelation::class)
             ->setConstructorArgs(array('domain_name|a_categorization_type|a_type|a_sub_type'))
             ->getMockForAbstractClass()
    	;
    	
    	$this->assertSame($relation->getRelationDomain(), 'domain_name');
    	$this->assertSame($relation->getCategorizationType(), 'a_categorization_type');
    	$this->assertSame($relation->getMainType(), 'a_type');
    	$this->assertSame($relation->getSubType(), 'a_sub_type');
    }
}
