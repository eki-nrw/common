<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Tests\Relationship;

use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\Relationship\Relationship;
use Eki\NRW\Common\Relations\Relationship\RelationshipInterface;
use Eki\NRW\Common\Relations\Node;

use PHPUnit\Framework\TestCase;

use stdClass;

class RelationshipTest extends TestCase
{
	public function testInterfaces()
	{
    	$relationship = new Relationship();
    	
    	$this->assertInstanceOf(RelationInterface::class, $relationship);
    	$this->assertInstanceOf(RelationshipInterface::class, $relationship);
	}

	public function testRelationshipIsRelationWithRelationTypeIsRelationship()
	{
		$this->assertSame(RelationInterface::RELATION_TYPE_RELATIONSHIP, Relationship::getRelationType());
	}
	
	public function testDefaults()
	{
    	$relationship = new Relationship();

		$this->assertSame($relationship->getType(), RelationshipInterface::RELATIONSHIP_TYPE_DUMMY);
		$this->assertEmpty($relationship->getLabel());		
		$this->assertNull($relationship->getValue());		
		$this->assertNull($relationship->getNode());
		$this->assertNull($relationship->getOtherNode());
	}

	public function testWithNode()
	{
    	$relationship = new Relationship();
		
		$relationship->setNode(new Node());
		$this->assertNotNull($relationship->getNode());		

		$relationship->setOtherNode(new Node());
		$this->assertNotNull($relationship->getOtherNode());		
	}
	
	public function testLabel()
	{
    	$relationship = new Relationship();

		$relationship->setLabel('Sample Label');
		
		$this->assertSame('Sample Label', $relationship->getLabel());		
	}

	public function testValue()
	{
    	$relationship = new Relationship();

		$relationship->setValue('Sample Value');
		$this->assertSame('Sample Value', $relationship->getValue());		

		$relationship->setValue(999);
		$this->assertEquals(999, $relationship->getValue());		

		$relationship->setValue(array('one' => 1, 'two' => 2, 'three' => '3'));
		$this->assertEquals(array('one' => 1, 'two' => 2, 'three' => '3'), $relationship->getValue());		

		$obj = new stdClass();
		$relationship->setValue($obj);
		$this->assertEquals($obj, $relationship->getValue());		
	}
}
