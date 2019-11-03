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

use Eki\NRW\Common\Location\Location;
use Eki\NRW\Common\Location\CoordinationInterface;
use Eki\NRW\Common\Location\CoordinationTypes;
use Eki\NRW\Common\Location\AddressCoordination;
use Eki\NRW\Common\Location\GeographicalCoordination;

use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testLocationNoCoordinates()
    {
    	$location1 = new Location('location 1');

		$this->assertSame($location1->getLocationName(), "location 1");
		$this->assertEmpty($location1->getCoordinates());    	
    }

    public function testLocationHasCoordinates()
    {
    	$location = new Location('location name', "coordination_type", array('key_1' =>'a', 'key_2' => 100));

		$this->assertSame($location->getLocationName(), "location name");
		$this->assertNotEmpty($location->getCoordinates()); 
    }

    public function testLocationHasAddress()
    {
		$address = new AddressCoordination(
			'111 Abc street',   // line 1
			'West Side', 		// line 2
			'Big Province',    	// province
			'Great State',     	// state
			'Beautiful Country',// country
			'1234567'          	// post code
		);
    	$location = new Location('location name', "location_type", $address);

		$this->assertSame($location->getLocationName(), "location name");
		$this->assertNotEmpty($location->getCoordinates()); 
		$this->assertSame(
			$address->__toArray() + array('type' => CoordinationTypes::TYPE_ADDRESS), 
			$location->getCoordinates()
		);
    }

    public function testLocationHasGC()
    {
		$gc = new GeographicalCoordination(10.9876, 1.0808088);
    	$location = new Location('location name', "location_type", $gc);

		$this->assertSame($location->getLocationName(), "location name");
		$this->assertNotEmpty($location->getCoordinates()); 
		$this->assertSame(
			$gc->__toArray() + array('type' => CoordinationTypes::TYPE_GEOGRAPHIC), 
			$location->getCoordinates()
		);
    }
}
