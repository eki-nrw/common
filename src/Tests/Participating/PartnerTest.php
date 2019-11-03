<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Participating;

use Eki\NRW\Common\Participating\Partner;
use Eki\NRW\Common\Participating\PartnerInterface;
use Eki\NRW\Common\Participating\HasPartnerInterface;
use Eki\NRW\Common\Common\HasAttributesInterface;
use Eki\NRW\Common\Common\HasPropertiesInterface;

use PHPUnit\Framework\TestCase;

class PartnerTest extends TestCase
{
	public function testConstructor_atleast()
	{
		$partner = new Partner("A");

		$this->assertEquals($partner->getIndex(), "A");
		$this->assertNull($partner->getName());
		$this->assertNull($partner->getActor());
		
		$this->assertInstanceOf(HasAttributesInterface::class, $partner);
		$this->assertInstanceOf(HasPropertiesInterface::class, $partner);
	}
}
