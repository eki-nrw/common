<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Location;

use Eki\NRW\Common\Location\AbstractCoordination;

use PHPUnit\Framework\TestCase;

class AbstractCoordinationTest extends TestCase
{
    public function testConstructorSpecifiesType()
    {
    	$type = "a_coordination_type";
    	$coordination = $this->getMockBuilder(AbstractCoordination::class)
    		->setConstructorArgs(array(
    			$type
    		))
    		->getMockForAbstractClass()
    	;
    	
    	$this->assertSame($coordination->getType(), $type);
    }

    public function testConstructorSpecifiesTypeAndCoordinates()
    {
    	$coordination = $this->getMockBuilder(AbstractCoordination::class)
    		->setConstructorArgs(array(
    			'a_coordination_type',
    			array(
    				'key_1' => 'key_1',
    				'key_2' => 'key_2'
    			)
    		))
    		->getMockForAbstractClass()
    	;
    }
}
