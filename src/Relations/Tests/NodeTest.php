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
use Eki\NRW\Common\Relations\Node;

use PHPUnit\Framework\TestCase;

use stdClass;

class NodeTest extends TestCase
{
    public function testInterfaces()
    {
		$node = $this->getMockBuilder(Node::class)->getMock();
		
		$this->assertInstanceOf(NodeInterface::class, $node);
	}
    
    public function testNodeEmpty()
    {
		$node = $this->getMockBuilder(Node::class)
             ->setConstructorArgs(array())
             ->getMock()
    	;

		$this->assertEmpty($node->getName());
		$this->assertNull($node->getObject());    	
    }
    
    public function testNodeWithName()
    {
    	$node = new Node('a_node_name');

		$this->assertSame($node->getName(), 'a_node_name');
    }

    public function testNodeWithObject()
    {
    	$obj = new stdClass();
    	$node = new Node('a_node_name', $obj);

		$this->assertNotNull($node->getObject());
		$this->assertEquals($obj, $node->getObject());
    }
}
