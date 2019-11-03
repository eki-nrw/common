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

use Eki\NRW\Common\Res\Factory\Factory;
use Eki\NRW\Common\Res\Factory\RegistryInterface;

use PHPUnit\Framework\TestCase;

use stdClass;

class FactoryTest extends TestCase
{
	public function testConstructorDefaultClass()
	{
		$factory = new Factory(stdClass::class);
	}

	public function testConstructorTypesAndClassnames()
	{
		$factory = new Factory(array(
			'type_a' => stdClass::class,
			'type_b' => stdClass::class,
			'type_c' => stdClass::class,
		));
	}

	public function testConstructorRegistries()
	{
		$factory = new Factory(array(
			$this->createRegistry('type_a', stdClass::class),
			$this->createRegistry('type_b', stdClass::class),
			$this->createRegistry('type_c', stdClass::class),
		));
	}

	public function testCreateNew()
	{
		$factory = $this->createFactory();
		
		$obj = $factory->createnew('type_a');
		$this->assertNotNull($obj);
		$this->assertInstanceOf(stdClass::class, $obj);
	}

	public function testCreateNewWithArgs()
	{
		$factory = $this->createFactory();
		
		$obj = $factory->createnew('class_object_to_new', array(20, array('a' => 1, 'b' => 2)));
		$this->assertNotNull($obj);
		$this->assertInstanceOf(ClassObjectToNew::class, $obj);
	}

	public function testSupport()
	{
		$factory = $this->createFactory();
		
		$this->assertTrue($factory->support('type_a'));
		$this->assertTrue($factory->support('type_b'));
		$this->assertTrue($factory->support('type_c'));
		$this->assertFalse($factory->support('type_d'));
	}

	public function testExtractFactory()
	{
		$factory = new Factory(array(
			$this->createRegistry('type_a', stdClass::class),
			$this->createRegistry('type_b', stdClass::class),
			$this->createRegistry('type_c', stdClass::class),
			$this->createRegistry('type_d', stdClass::class),
			$this->createRegistry('type_e', stdClass::class),
		));
		
		$extractedFactory = $factory->extractFactory(array(
			'type_a',
			'type_b'
		));
		$this->assertTrue($extractedFactory->support('type_a'));
		$this->assertTrue($extractedFactory->support('type_b'));
	}

	/**
	* @expectedException \InvalidArgumentException
	* 
	*/
	public function testExtractFactoryWrongTypes()
	{
		$factory = new Factory(array(
			$this->createRegistry('type_a', stdClass::class),
			$this->createRegistry('type_b', stdClass::class),
			$this->createRegistry('type_c', stdClass::class),
			$this->createRegistry('type_d', stdClass::class),
			$this->createRegistry('type_e', stdClass::class),
		));
		
		$extractedFactory = $factory->extractFactory(array(
			'type_a',
			'type_b',
			'type_100'
		));
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
	
	private function createFactory()
	{
		return new Factory(array(
			$this->createRegistry('type_a', stdClass::class),
			$this->createRegistry('type_b', stdClass::class),
			$this->createRegistry('type_c', stdClass::class),
			$this->createRegistry('class_object_to_new', ClassObjectToNew::class),
		));
	}
}

class ClassObjectToNew
{
	public function __construct($i, array $arr)
	{
		
	}
}