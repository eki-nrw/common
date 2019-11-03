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

use Eki\NRW\Common\Extension\ExtensionInterface;
use Eki\NRW\Common\Extension\AbstractExtension;

use PHPUnit\Framework\TestCase;

use stdClass;

class AbstractExtensionTest extends TestCase
{
    public function testInterfaces()
    {
		$extension = $this->getMockBuilder(AbstractExtension::class)
    		->disableOriginalConstructor()
			->getMockForAbstractClass()
		;
		
		$this->assertInstanceOf(ExtensionInterface::class, $extension);
    }

	public function testConstructor()
	{
		$extension = $this->getMockBuilder(AbstractExtension::class)
    		->setConstructorArgs(array(stdClass::class))
			->getMockForAbstractClass()
		;
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
	public function testConstructor_ClassInputNotExist()
	{
		$extension = $this->getMockBuilder(AbstractExtension::class)
    		->setConstructorArgs(array('A\B\C'))
			->getMockForAbstractClass()
		;
	}

	public function testSupport()
	{
		$extension = $this->getMockBuilder(AbstractExtension::class)
    		->setConstructorArgs(array(stdClass::class))
			->getMockForAbstractClass()
		;
		
		$this->assertTrue($extension->support(new stdClass()));
	}

	public function testNotSupport()
	{
		$extension = $this->getMockBuilder(AbstractExtension::class)
    		->setConstructorArgs(array(stdClass::class))
			->getMockForAbstractClass()
		;
		
		$this->assertFalse($extension->support(rray(1, 2, 3)));
	}
}
