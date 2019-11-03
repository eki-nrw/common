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
use Eki\NRW\Common\Relations\NodeTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

class NodeTraitTest extends TestCase
{
    public function testName()
    {
		$nodeTrait = $this->getMockBuilder(NodeTrait::class)
             ->disableOriginalConstructor()
             ->getMockForTrait()
    	;

		$this->assertNull($nodeTrait->getName());
    }

    public function testObject()
    {
		$nodeTrait = $this->getMockBuilder(NodeTrait::class)
             ->disableOriginalConstructor()
             ->getMockForTrait()
    	;

		$this->assertNull($nodeTrait->getObject());
    	
    	$obj = $this->getMockBuilder(stdClass::class)->getMock();
    	
    	$nodeTrait->setObject($obj);
    	$this->assertNotNull($nodeTrait->getObject());
    	$this->assertEquals($nodeTrait->getObject(), $obj);
    }
}
