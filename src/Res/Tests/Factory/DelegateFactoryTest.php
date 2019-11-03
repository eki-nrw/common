<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Tests\Factory;

use Eki\NRW\Common\Res\Factory\DelegateFactory;
use Eki\NRW\Common\Res\Factory\Factory;
use Eki\NRW\Common\Res\Factory\RegistryInterface;

use PHPUnit\Framework\TestCase;

use stdClass;

class DelegateFactoryTest extends TestCase
{
	public function testConstructor()
	{
		$delegateFactory = new DelegateFactory(array(
			$this->createFactory(array('type_a', 'type_b', 'type_c')),	
			$this->createFactory(array('type_x', 'type_y', 'type_z')),	
			$this->createFactory(array('type_1', 'type_2', )),	
		));
	}
	
	public function testCreateNew()
	{
		$delegateFactory = $this->createDelegateFactory();
		
		$this->assertNotNull($delegateFactory->createNew('type_a'));
		$this->assertNotNull($delegateFactory->createNew('type_x'));
		$this->assertNotNull($delegateFactory->createNew('type_1'));
		$this->assertNull($delegateFactory->createNew('type_aaa'));
	}

	public function testSupport()
	{
		$delegateFactory = $this->createDelegateFactory();
		
		$this->assertTrue($delegateFactory->support('type_a'));
		$this->assertTrue($delegateFactory->support('type_b'));
		$this->assertTrue($delegateFactory->support('type_c'));
		$this->assertFalse($delegateFactory->support('type_d'));

		$this->assertTrue($delegateFactory->support('type_x'));
		$this->assertTrue($delegateFactory->support('type_y'));
		$this->assertTrue($delegateFactory->support('type_z'));
		$this->assertFalse($delegateFactory->support('type_xx'));
		
		$this->assertTrue($delegateFactory->support('type_1'));
		$this->assertTrue($delegateFactory->support('type_2'));
		$this->assertFalse($delegateFactory->support('type_100'));
	}

	public function testExtractFactory()
	{
		$delegateFactory = $this->createDelegateFactory();
		
		$extractFactory = $delegateFactory->extractFactory(array('type_a', 'type_x', 'type_1'));
		$this->assertTrue($extractFactory->support('type_a'));
		$this->assertTrue($extractFactory->support('type_x'));
		$this->assertTrue($extractFactory->support('type_1'));
	}

	/**
	* @expectedException \InvalidArgumentException
	* 
	*/
	public function testExtractFactoryWrongTypes()
	{
		$delegateFactory = $this->createDelegateFactory();
		
		$extractFactory = $delegateFactory->extractFactory(array('type_aaaaa', 'type_x', 'type_1'));
	}

	private function createDelegateFactory(array $groupTypes = [])
	{
		if (empty($groupTypes))
		{
			$groupTypes = [
				[ 'type_a', 'type_b', 'type_c' ],	
				[ 'type_x', 'type_y', 'type_z' ],	
				[ 'type_1', 'type_2' ],	
			];
		}
		
		$factories = [];
		foreach($groupTypes as $groupType)
		{
			$registries = [];
			foreach($groupType as $type)
			{
				$registries[$type] = stdClass::class;
			}
			$factories[] = new Factory($registries);
		}
		
		$delegateFactory = new DelegateFactory($factories);
		
		return $delegateFactory;
	}
	
	private function createRegistry($type, $classname)
	{
		$registry = $this->getMockBuilder(RegistryInterface::class)
			->setMethods(['getType', 'getClassname'])
			->getMockForAbstractClass()
		;
		
		$registry->expects($this->any())
			->method('getType')
			->will($this->returnValue($type))
		;

		$__classname = $classname;

		$registry->expects($this->any())
			->method('getClassname')
			->will($this->returnCallback(function () use ($__classname) {
				if (!class_exists($__classname))
					$this->throwException(new \InvalidArgumentException("No class $__classname exists."));
				
				return $__classname;
			}))
		;
		
		return $registry;
	}
	
	private function createFactory(array $types)
	{
		$registries = [];
		foreach($types as $type)
		{
			$registries[] = $this->createRegistry($type, stdClass::class);
		}
		
		return new Factory($registries);
	}
}