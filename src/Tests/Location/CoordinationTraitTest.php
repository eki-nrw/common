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

use Eki\NRW\Common\Location\CoordinationTrait;

use PHPUnit\Framework\TestCase;

use InvalidArgumentException;

class CoordinationTraitTest extends TestCase
{
	public function testDummyCoordination()
	{
		$coordination = $this->getMockBuilder(CoordinationTrait::class)
			->setMethods(['validateCoordinate'])
			->getMockForTrait()
		;
		
		$coordination->expects($this->exactly(4))
			->method('validateCoordinate')
			->will($this->returnCallback(function ($key, $coordinate) {} ))
		;
		
		$this->assertEmpty($coordination->getCoordinates());
		
		$coordination->setCoordinate('a_key', 'a_coordinate');
		$this->assertEquals('a_coordinate', $coordination->getCoordinate('a_key'));

		$coordination->setCoordinate('key_1', 11111);
		$this->assertEquals(11111, $coordination->getCoordinate('key_1'));
		
		$coordination->setCoordinates([]);
		$this->assertEmpty($coordination->getCoordinates());
		
		$coordination->setCoordinates(array(
			'a_key' => 'a_coordinate',
			'key_1' => 11111
		));
		$this->assertNotEmpty($coordination->getCoordinates());
	}

	public function testNumericCoordination()
	{
		$coordination = $this->getMockBuilder(CoordinationTrait::class)
			->setMethods(['validateCoordinate'])
			->getMockForTrait()
		;
		
		$coordination->expects($this->exactly(3))
			->method('validateCoordinate')
			->will($this->returnCallback(function ($key, $coordinate) {
				if (!is_numeric($coordinate))
					throw new \InvalidArgumentException("Coordinate with key %key must be numeric.");
			} ))
		;
		
		$this->assertEmpty($coordination->getCoordinates());
		
		$coordination->setCoordinate('key_1', 11111);
		$this->assertEquals(11111, $coordination->getCoordinate('key_1'));

		$coordination->setCoordinate('key_2', 100.20);
		$this->assertEquals(100.20, $coordination->getCoordinate('key_2'));

		$this->expectException(InvalidArgumentException::class);
		$coordination->setCoordinate('a_key', 'string is not numeric, of source.');

		$this->expectException(InvalidArgumentException::class);
		$coordination->setCoordinate('array_key', array(1, 2, 3));
	}
}
