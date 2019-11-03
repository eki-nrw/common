<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Tests;

use Eki\NRW\Common\Relations\PotentialTrait;
use Eki\NRW\Common\Relations\PotentialInterface;

use PHPUnit\Framework\TestCase;

class PotentialTraitTest extends TestCase
{
    public function testDefaults()
    {
		$potentialTrait = $this->createPotentialTrait();
		
		$this->assertFalse($potentialTrait->isActive());
		$this->assertEquals(PotentialInterface::POTENTIAL_DEFAULT_FIRST, $potentialTrait->getPotential());
		$this->assertTrue($potentialTrait->isPotentialMin());
		$this->assertFalse($potentialTrait->isPotentialMax());
    }
    
    /**
	* @dataProvider getData
	* 
	* @return
	*/
    public function testNormal($active, $potential)
    {
		$potentialTrait = $this->createPotentialTrait();
		
		$potentialTrait->setPotential($potential);
		$this->assertEquals($potential, $potentialTrait->getPotential());

		$potentialTrait->setActive($active);
		$this->assertTrue($potentialTrait->isActive() === $active);
		
		$potentialTrait->setActive();
		$this->assertTrue($potentialTrait->isActive());
	}   
	
	public function getData()
	{
		return [
			[ true, 1 ],
			[ true, 2 ],
			[ true, 3 ],
			[ false, 1 ],
			[ false, 2 ],
			[ false, 3 ],
		];
	}

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetPotentialStringIsInvalid()
    {
		$potentialTrait = $this->createPotentialTrait();
		
		$potentialTrait->setPotential('one');
	}	

    /**
     * @expectedException \OutOfRangeException
     */
    public function testSetPotentialOutOfRange()
    {
		$potentialTrait = $this->createPotentialTrait();
		
		$potentialTrait->setPotential(5);
	}	

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testActivePotentialMustBeBool()
    {
		$potentialTrait = $this->createPotentialTrait();
		
		$potentialTrait->setActive(100);
	}	
	
	private function createPotentialTrait()
	{
		$parameters = [];
		
		$potentialTrait = $this->getMockBuilder(PotentialTrait::class)
			->setMethods(['getParameter', 'setParameter'])
			->getMockForTrait()
		;
		
		$potentialTrait
			->expects($this->any())
			->method('getParameter')
			->will($this->returnCallback(function ($key, $defaultValue = null) use (&$parameters) {
				if (isset($parameters[$key]))
					return $parameters[$key];
				else
					return $defaultValue;
			}))	
		;

		$potentialTrait
			->expects($this->any())
			->method('setParameter')
			->will($this->returnCallback(function ($key, $val) use (&$parameters) {
				$parameters[$key] = $val;
			}))	
		;
		
		return $potentialTrait;
	}
}
