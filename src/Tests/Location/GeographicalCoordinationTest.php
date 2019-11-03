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

use Eki\NRW\Common\Location\GeographicalCoordination;
use Eki\NRW\Common\Location\GeographicalCoordinationInterface;
use Eki\NRW\Common\Location\CoordinationTypes;

use PHPUnit\Framework\TestCase;

class GeographicalCoordinationTest extends TestCase
{
    public function testType()
    {
		$coordination = new GeographicalCoordination();
		
		$this->assertSame($coordination->getType(), CoordinationTypes::TYPE_GEOGRAPHIC);
	}

    public function testCoordinationNotSetBefore()
    {
		$coordination = new GeographicalCoordination();
		
		$this->assertSame($coordination->getLongitude(), 0);
		$this->assertSame($coordination->getLatitude(), 0);
	}
	
    public function testCoordination()
    {
		$coordination = new GeographicalCoordination(10.9876, 1.0808088);
		
		$this->assertSame($coordination->getLongitude(), 10.9876);
		$this->assertSame($coordination->getLatitude(), 1.0808088);
    }
}
