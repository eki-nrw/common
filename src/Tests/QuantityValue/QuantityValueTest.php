<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\QUantityValue;

use Eki\NRW\Common\QuantityValue\QuantityValue;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class QuantityValueTest extends TestCase
{
	public function testConstructor_Default()
	{
		$quantity = new QuantityValue();
		
		$this->assertEquals(0, $quantity->getQuantity());
		$this->assertSame("", $quantity->getUnitAlias());
	}

	public function testConstructor()
	{
		$quantity = new QuantityValue(100, "a_unit");
		
		$this->assertEquals(100, $quantity->getQuantity());
		$this->assertSame("a_unit", $quantity->getUnitAlias());
	}
}
