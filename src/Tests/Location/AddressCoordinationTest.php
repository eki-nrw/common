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

use Eki\NRW\Common\Location\AddressCoordination;
use Eki\NRW\Common\Location\AddressCoordinationInterface;
use Eki\NRW\Common\Location\CoordinationTypes;

use PHPUnit\Framework\TestCase;

class AddressCoordinationTest extends TestCase
{
    public function testType()
    {
		$coordination = new AddressCoordination();
		
		$this->assertSame($coordination->getType(), CoordinationTypes::TYPE_ADDRESS);
	}

    public function testCoordinationNotSetBefore()
    {
		$coordination = new AddressCoordination();
		
		$this->assertSame($coordination->getCountry(), '');
		$this->assertSame($coordination->getState(), '');
		$this->assertSame($coordination->getProvince(), '');
		$this->assertSame($coordination->getLine1(), '');
		$this->assertSame($coordination->getLine2(), '');
		$this->assertSame($coordination->getPostCode(), '');
	}
	
    public function testCoordinationWithoutValidator()
    {
		$coordination = new AddressCoordination(
			'111 Abc street',   // line 1
			'West Side', 		// line 2
			'Big Province',    	// province
			'Great State',     	// state
			'Beautiful Country',// country
			'1234567'          	// post code
		);
		
		$this->assertSame($coordination->getCountry(), 'Beautiful Country');
		$this->assertSame($coordination->getState(), 'Great State');
		$this->assertSame($coordination->getProvince(), 'Big Province');
		$this->assertSame($coordination->getLine1(), '111 Abc street');
		$this->assertSame($coordination->getLine2(), 'West Side');
		$this->assertSame($coordination->getPostCode(), '1234567');
    }
}
