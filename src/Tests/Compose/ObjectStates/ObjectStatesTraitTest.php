<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Compose\ObjectStates;

use Eki\NRW\Common\Compose\ObjectStates\ObjectStatesTrait;

use stdClass;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectStatesTraitTest extends TestCase
{
	private $objectStatesTrait;
	
	public function setUp()
	{
		$this->objectStatesTrait = $this->getMockBuilder(ObjectStatesTrait::class)
			->getMockForTrait()
		;
	}
	
	public function tearDown()
	{
		$this->objectStatesTrait = null;
	}
	
    public function testGetCurrentState()
    {
    	$objectStates = $this->objectStatesTrait;
    	
    	$this->assertNull($objectStates->getCurrentState('a_definition'));
    }

    public function testSetCurrentState()
    {
    	$objectStates = $this->objectStatesTrait;
    	
    	$objectStates->setCurrentState('a_definition', 'a_state');
    	
    	$this->assertSame('a_state', $objectStates->getCurrentState('a_definition'));
    }
}
