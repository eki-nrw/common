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

use Eki\NRW\Common\Relations\NodeInterface;
use Eki\NRW\Common\Relations\RelationTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

class RelationTraitTest extends TestCase
{
    public function testName()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

		$this->assertNull($relation->getName());
    	
    	$relation->setName("a name");
    	$this->assertSame($relation->getName(), "a name");
    }

    public function testBase()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

		$this->assertNull($relation->getBase());
    	
    	$node = $this->getMockBuilder(NodeInterface::class)->getMock();
    	
    	$relation->setBase($node);
    	$this->assertNotNull($relation->getBase());
    }

    public function testOthers()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

		$this->assertEquals(0, sizeof($relation->getOthers()));
    	
    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));
		$this->assertEquals(2, sizeof($relation->getOthers()));
    }

	/**
     * @expectedException \InvalidArgumentException
     */
    public function testOthers_Wrong()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;
    	
    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(stdClass::class)->getMock();
    	
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));
    }
    
    public function testAddOther()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMockForAbstractClass();
		$relation->addOther($node1, 'node_1');		

    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMockForAbstractClass();
		$relation->addOther($node2, 'node_2');		
	}

	/**
     * @expectedException \InvalidArgumentException
     */
    public function testAddOther_DoubleKey()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
		$relation->addOther($node1, 'node');		

    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
		$relation->addOther($node2, 'node');		
	}

    public function testRemoveOther()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));

		$relation->removeOther($node1);		
	}

	/**
     * @expectedException \UnexpectedValueException
     */
    public function testRemoveOther_NoOther()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node3 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));

		$relation->removeOther($node3);		
	}

    public function testRemoveOtherHasKey()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));

		$relation->removeOtherByKey('node_1');		
	}
	
	/**
     * @expectedException \InvalidArgumentException
     */
    public function testRemoveOtherByKey_NoKey()
    {
		$relation = $this->getMockBuilder(RelationTrait::class)
             ->getMockForTrait()
    	;

    	$node1 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$node2 = $this->getMockBuilder(NodeInterface::class)->getMock();
    	$relation->setOthers(array(
    		'node_1' => $node1, 
    		'node_2' => $node2
    	));

		$relation->removeOtherByKey('node');		
	}
}
