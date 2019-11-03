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

use Eki\NRW\Common\Location\LocationAwareTrait;
use Eki\NRW\Common\Location\LocationInterface;

use PHPUnit\Framework\TestCase;

class LocationAwareTraitTest extends TestCase
{
	public function testLocationAware()
	{
		$trait = $this->getMockBuilder(LocationAwareTrait::class)->getMockForTrait();
		$location = $this->getMockBuilder(LocationInterface::class)
			->disableAutoload()
			->getMock()
		;
		
		$trait->setLocation($location);
		$trait->setLocation();
	}
}
