<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Extension;

use Eki\NRW\Common\Extension\BuilderInterface;
use Eki\NRW\Common\Extension\AbstractBuilder;
use Eki\NRW\Common\Extension\ConfigBuilder;
use Eki\NRW\Common\Res\Factory\FactoryInterface;
use Eki\NRW\Common\Element\ElementInterface;

use Eki\NRW\Common\Tests\Extension\Fixtures\DataClass;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

use PHPUnit\Framework\TestCase;

use stdClass;

class AbstractBuilderTest extends TestCase
{
	private $factory;
	private $builder;
	
	private $object_name;
	private $properties;
	
	public function setUp()
	{
		$this->factory = $this->createFactory();
		$this->builder = $this->getMockBuilder(AbstractBuilder::class)
			->setConstructorArgs(array(
				'builder_type',
				$this->factory
			))
			->getMockForAbstractClass()
		;
	}
	
	public function tearDown()
	{
		$this->builder = null;
		$this->factory = null;
	}
	
    public function testInterfaces()
    {
		$builder = $this->getMockBuilder(AbstractBuilder::class)
    		->disableOriginalConstructor()
			->getMockForAbstractClass()
		;
		
		$this->assertInstanceOf(BuilderInterface::class, $builder);
		$this->assertInstanceOf(ConfigBuilder::class, $builder);
    }

	public function testSetName()
	{
		// setName method must be return this
		$this->assertEquals($this->builder, $this->builder->setName('The test name'));
	}

	public function testAddProperty()
	{
		// addProperty method must be return this
		$this->assertEquals($this->builder, $this->builder->addProperty('property name', array()));
	}

	/**
	* @expectedException \LogicException
	*/
	public function testAddPropertyWithPropertyNameAdded()
	{
		$this->builder->addProperty('property name', array());
		$this->builder->addProperty('property name', array(1, 2));
	}

	/**
	* @expectedException \LogicException
	*/
	public function testSetPropertyWithPropertyNameDoNotExistbefore()
	{
		$this->builder->setProperty('property name', array());
	}

	public function testSetProperty()
	{
		$this->builder->addProperty('prop name', array());
		$this->builder->setProperty('prop name', array(1, 2, 3));
	}

	public function testAddOption()
	{
		// addOption method must be return this
		$this->assertEquals($this->builder, $this->builder->addOption('option name', array()));
	}

	/**
	* @expectedException \LogicException
	*/
	public function testAddOptionWithPropertyNameAdded()
	{
		$this->builder->addOption('option name', array());
		$this->builder->addOption('option name', array(1, 2));
	}

	/**
	* @expectedException \LogicException
	*/
	public function testSetOptionWithPropertyNameDoNotExistbefore()
	{
		$this->builder->setOption('option name', array());
	}

	public function testSetOption()
	{
		$this->builder->addOption('opt name', array());
		$this->builder->setOption('opt name', array(1, 2, 3));
	}

	public function testSetData()
	{
		$this->builder->setData('data object name', new stdClass());
		$this->builder->setData('data array name', array(1, 2, 3));
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
	public function testSetDataThatIsScalar()
	{
		$this->builder->setData('the string name', 'ashjlfjlashkljaslkfjlkas');
	}

	/**
	* @expectedException \LogicException
	*/
	public function testSetData_CannotSetDataSameNameTwice()
	{
		$this->builder->setData('the specified name', new stdClass());
		$this->builder->setData('the specified name', new stdClass());
	}

	/**
	* Attribute will be able to create, override with any type of value
	*/
	public function testSetAttribute()
	{
		$this->builder->setAttribute('attribute integer name', 1);
		$this->builder->setAttribute('attribute string name', 'string');
		$this->builder->setAttribute('attribute float name', 3.0);
		$this->builder->setAttribute('attribute array name', array(1 , 2, 3));
		$this->builder->setAttribute('attribute object name', new stdClass());
	
		// override		
		$this->builder->setAttribute('attribute integer name', 99);
		$this->builder->setAttribute('attribute array name', array('one' => 1 , 'two' => 2, 'three' => '3'));
		$this->builder->setAttribute('attribute object name', new stdClass());
		
	}

	public function testAddElement()
	{
		$this->builder->addElement($this->createElement("Element 1"));
		$this->builder->addElement($this->createElement("Element 2"));
	}

	/**
	* @expectedException \LogicException
	*/
	public function testAddElement_CannotAddElementSameNameTwice()
	{
		$this->builder->addElement($this->createElement("Element Same Name"));
		$this->builder->addElement($this->createElement("Element Same Name"));
	}

	public function testGet_Name()
	{
		$builder = $this->createBuilderForGetTest('name');
		
		$obj = $builder
			->setName('abcdef')
			->get()
		;
		
		$accessor = PropertyAccess::createPropertyAccessor();
		
		$this->assertTrue($accessor->isWritable($obj, 'objectName'));
		$this->assertTrue($accessor->isReadable($obj, 'objectName'));
		
		$obj->setObjectName('abcdef');
		$this->assertSame('abcdef', $obj->getObjectName());
	}

	public function testGet_Data()
	{
		$builder = $this->createBuilderForGetTest('data');
		
		$obj = $builder
			->setData('data_1', new stdClass())
			->setData('data_2', new stdClass())
			->get()
		;

		$this->assertTrue(is_array($obj->getObjectData()));
		
		foreach($obj->getObjectData() as $key => $dt)
		{
			$this->assertInstanceOf(stdClass::class, $dt);
		}
	}

	public function testGet_Element()
	{
		$builder = $this->createBuilderForGetTest('element');

		$obj = $builder
			->addElement($this->createElement('element_name_1'))
			->addElement($this->createElement('element_name_2'))
			->get()
		;

		$this->assertInstanceOf(ElementInterface::class, $obj->getElement('element_name_1'));		
		$this->assertInstanceOf(ElementInterface::class, $obj->getElement('element_name_2'));		
	}

	public function testGet_Properties()
	{
		$builder = $this->createBuilderForGetTest('properties');
		
		$obj = $builder
			->addProperty('group_1', array('a' => 'A', 'b' => 'B'))
			->get()
		;
		
		$props = $obj->getProperties();
		foreach($props as $k => $v)
		{
			if (is_array($v))
			{
				foreach($v as $k1 => $v1)
				{
					print '    ' . $k1 . '=' . $v1 . "\n";
				}
			}
			else
				print $k . '=' . $v . "\n";
		}
	}

	public function testGet_Options()
	{
		$builder = $this->createBuilderForGetTest('options');
		
		$obj = $builder
			->addOption('group_1', array('a' => 'A', 'b' => 'B'))
			->get()
		;
		
		$options = $obj->getOptions();
		foreach($options as $k => $v)
		{
			if (is_array($v))
			{
				foreach($v as $k1 => $v1)
				{
					print '    ' . $k1 . '=' . $v1 . "\n";
				}
			}
			else
				print $k . '=' . $v . "\n";
		}
	}

	public function testGet_Attributes()
	{
		$builder = $this->createBuilderForGetTest('attributes');
		
		$obj = $builder
			->setAttribute('number', 100)
			->setAttribute('url', 'https://vnexpress.net')
			->setAttribute('nickname', 'a string a string a string')
			->setAttribute('info', array('un' => 1, 'deux' => 2))
			->setAttribute('image', new stdClass())
			->get()
		;
		
		$attributes = $obj->getAttributes();
		foreach($attributes as $k => $v)
		{
			if (is_object($v))
				continue;
				
			if (is_array($v))
			{
				foreach($v as $k1 => $v1)
				{
					print '    ' . $k1 . '=' . $v1 . "\n";
				}
			}
			else
				print $k . '=' . $v . "\n";
		}
	}
	
	/**
	* @expectedException \UnexpectedValueException
	*/
	public function testGet_NoTypeSpecified()
	{
		$factory = $this->createFactoryForGetTest();

		$obj = $factory->createNew('xxx');
	}
	
	private function createObjectToBuild($purpose)
	{
		$method = 'createObjectToBuild_' . $purpose;
		
		if (!method_exists($this, $method))
			throw new \UnexpectedValueException("No method $method");
			
		return $this->$method();
	}

	private function createObjectToBuild_name()
	{
		$obj = $this->getMockBuilder(stdClass::class)
			->setMethods(['setObjectName', 'getObjectName'])
			->getMock()
		;
		
		$obj->expects($this->any())		
			->method('setObjectName')
			->will($this->returnCallback(function ($name) {
				$this->object_name = $name;	
			}))
		;

		$obj->expects($this->any())		
			->method('getObjectName')
			->will($this->returnCallback(function () {
				return $this->object_name;
			}))
		;
		
		return $obj;
	}

	private function createObjectToBuild_configureProperties()
	{
		$obj = $this->getMockBuilder(stdClass::class)
			->setMethods(['configureProperties', 'setProperties', 'getProperties'])
			->getMock()
		;
		
		$obj->expects($this->any())		
			->method('configureProperties')
			->will($this->returnCallback(function (OptionsResolver $resolver) {
				$resolver->setDefaults(array(
					'one' => array(1),
					'a_prop' => array('A property'),
				));
				$resolver->setDefined('group_1');
				$resolver->setAllowedTypes('group_1', array('array'));
			}))
		;
		
		$obj->expects($this->any())		
			->method('setProperties')
			->will($this->returnCallback(function (array $properties) {
				$this->properties = $properties;	
			}))
		;

		$obj->expects($this->any())		
			->method('getProperties')
			->will($this->returnCallback(function () {
				return $this->properties;
			}))
		;
		
		return $obj;
	}

	private function createBuilderForGetTest($buildType)
	{
		$builder = $this->getMockBuilder(AbstractBuilder::class)
			->setConstructorArgs(array(
				$buildType,
				$this->createFactoryForGetTest()
			))
			->getMockForAbstractClass()
		;
		
		return $builder;
	}
	
	private function createFactoryForGetTest()
	{
		$factory = $this->getMockBuilder(FactoryInterface::class)
			->setMethods(['createNew'])
			->getMockForAbstractClass()
		;
		
		$factory->expects($this->any())
			->method('createNew')
			->will($this->returnCallback(function ($type) {
				$className = 'Eki\NRW\Common\Tests\Extension\Fixtures\Obj' . ucfirst($type);
				if (!class_exists($className))
					throw new \UnexpectedValueException("Class $className not found.");
				return new $className();
			}))
		;
		
		return $factory;
	}

	private function createFactory()
	{
    	return $this->getMockBuilder(FactoryInterface::class)->getMockForAbstractClass();
	}
	
	private function createExtension($extensionName)
	{
		$extension = $this->getMockBuilder(ExtensionInterface::class)
			->setMethods(['getExtensionName'])
			->getMockForAbstractClass()
		;
		
		$extension->expects($this->any())
			->method('getExtensionName')
			->will($this->returnValue($extensionName))
		;
		
		return $extension;
	}
	
	private function createElement($elementName)
	{
		$element = $this->getMockBuilder(ElementInterface::class)
			->setMethods(['getElementName'])
			->getMockForAbstractClass()
		;
		
		$element->expects($this->any())
			->method('getElementName')
			->will($this->returnValue($elementName))
		;
		
		return $element;
	}
}
