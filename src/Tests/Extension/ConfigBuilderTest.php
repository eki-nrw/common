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

use Eki\NRW\Common\Extension\ConfigBuilderInterface;
use Eki\NRW\Common\Extension\ConfigBuilder;
use Eki\NRW\Common\Extension\ExtensionInterface;
use Eki\NRW\Common\Res\Factory\FactoryInterface;

use PHPUnit\Framework\TestCase;

use stdClass;

class ConfigBuilderTest extends TestCase
{
    public function testInterfaces()
    {
    	$builder = $this->getMockBuilder(ConfigBuilder::class)
    		->disableOriginalConstructor()
    		->getMock()
    	;

		$this->assertInstanceOf(ConfigBuilderInterface::class, $builder);
    }
    
    public function testGetFactory()
    {
    	$factory = $this->createFactory();
    	$builder = new ConfigBuilder($factory);
		
		$this->assertEquals($factory, $builder->getFactory());
	}

    public function testExtensionsDefault()
    {
    	$builder = new ConfigBuilder($this->createFactory());
		
		$this->assertEmpty(sizeof($builder->getExtensions()));
	}

    public function testExtensionsContainNoExtensionInterface()
    {
    	$builder = new ConfigBuilder(
    		$this->createFactory(),
    		array(new stdClass(), new stdClass())
    	);
		
		$this->assertEmpty(sizeof($builder->getExtensions()));
	}

    public function testExtensionsContainExtensionInterface()
    {
    	$extension_1 = $this->createExtension('Extension One');
    	$extension_2 = $this->createExtension('Extension Two');
    	$extension_3 = $this->createExtension('Extension Three');
    	
    	$builder = new ConfigBuilder(
    		$this->createFactory(),
    		array(
		    	$this->createExtension('Extension One'),
		    	$this->createExtension('Extension Two'),
		    	$this->createExtension('Extension Three'),
    		)
    	);
		
		$this->assertEquals(3, sizeof($builder->getExtensions()));
	}
	
	public function testAddExtension()
	{
    	$builder = new ConfigBuilder($this->createFactory());

		$builder->addExtension($this->createExtension("The Extension Name"));		

		$this->assertEquals(1, sizeof($builder->getExtensions()));
	}
	
	private function createFactory()
	{
    	return $this->getMockBuilder(FactoryInterface::class)->getMock();
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
}
