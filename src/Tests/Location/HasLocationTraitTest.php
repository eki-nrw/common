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

use Eki\NRW\Common\Location\HasLocationTrait;
use Eki\NRW\Common\Location\LocationInterface;

use PHPUnit\Framework\TestCase;

class HasLocationTraitTest extends TestCase
{
	public function testHasLocation()
	{
		$trait = $this->getMockBuilder(HasLocationTrait::class)->getMockForTrait();
		$location = $this->getMockBuilder(LocationInterface::class)
			->disableAutoload()
			->getMock()
		;
		
		$trait->setLocation($location);
		$this->assertEquals($location, $trait->getLocation());

		$trait->setLocation();
		$this->assertNull($trait->getLocation());
	}
}
