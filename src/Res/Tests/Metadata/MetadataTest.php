<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Tests\Metadata;

use Eki\NRW\Common\Res\Metadata\MetadataInterface;
use Eki\NRW\Common\Res\Metadata\Metadata;

use PHPUnit\Framework\TestCase;

use \stdClass;

class OtherStdClass extends stdClass 
{
	
}

class MetadataTest extends TestCase
{
	public function testNoClasses()
	{
		$metadata = new Metadata("alias", array());
		
		$this->assertFalse($metadata->hasClass('def'));
		$this->assertFalse($metadata->hasClass('default'));
		$this->assertFalse($metadata->hasClass('any'));
	}

	public function testWithOneGoodClass()
	{
		$metadata = new Metadata("alias", stdClass::class);
		
		$this->assertTrue($metadata->hasClass($metadata->getDefaultName()));
	}

	public function testWithGoodClasses()
	{
		$metadata = new Metadata(
			"alias", 
			array(
				'def' => stdClass::class,
				'other' => OtherStdClass::class
			)
		);
		
		$this->assertTrue($metadata->hasClass('def'));
		$this->assertTrue($metadata->hasClass('other'));
		
		$this->assertSame($metadata->getClass('def'), stdClass::class);
		$this->assertSame($metadata->getClass('other'), OtherStdClass::class);
	}
	
	public function testGetAlias()
	{
		$metadata = new Metadata("alias_name", array());
		
		$this->assertSame("alias_name", $metadata->getAlias());
		$this->assertNotSame("alias_name_other", $metadata->getAlias());
	}

	public function testGetParameter()
	{
		$metadata = new Metadata("alias_name", array(), array('param_1' => 'Parameter 1'));
		
		$this->assertSame("Parameter 1", $metadata->getParameter('param_1'));
		$this->assertEmpty($metadata->getParameter('param_xyz'));
	}

	public function testGetParameters()
	{
		$parameters = array(
			'param_1' => 'Parameter 1', 
			'param_2' => 'Parameter 2'
		);
		$metadata = new Metadata("alias_name", array(), $parameters);
		
		$this->assertNotEmpty($metadata->getParameters());
		$this->assertSame(
			array(
				'param_1' => 'Parameter 1', 
				'param_2' => 'Parameter 2'
			),
			$metadata->getParameters()
		);
	}

	public function testHasParameter()
	{
		$metadata = new Metadata("alias_name", array(), array('param_1' => 'Parameter 1', 'param_2' => 'Parameter 2'));
		
		$this->assertTrue($metadata->hasParameter('param_1'));
		$this->assertNull($metadata->getParameter('param_xyz'));
	}

	public function testGetClass()
	{
		$classes = array(
			Metadata::NAME_DEFAULT => stdClass::class, 
			'other' => OtherStdClass::class
		);
		$metadata = new Metadata("alias_name", $classes, []);
		
		$this->assertNotEmpty($metadata->getClass(Metadata::NAME_DEFAULT));
		$this->assertNotEmpty($metadata->getClass('other'));
		$this->assertNotEmpty($metadata->getClass());
		$this->assertSame(stdClass::class, $metadata->getClass(Metadata::NAME_DEFAULT));
		$this->assertSame(OtherStdClass::class, $metadata->getClass('other'));
		$this->assertNull($metadata->getClass('wrong_class'));
	}

	public function testGetClasses()
	{
		$classes = array(
			'one' => stdClass::class, 
			'other' => OtherStdClass::class
		);
		$metadata = new Metadata("alias_name", $classes, []);
		
		$this->assertNotEmpty($metadata->getClasses());
		$this->assertSame(2, count($metadata->getClasses()));
		$this->assertSame(
			array(
				'one' => stdClass::class, 
				'other' => OtherStdClass::class
			),
			$metadata->getClasses()
		);
	}

	public function testHasClass()
	{
		$classes = array(
			'def' => stdClass::class, 
			'other' => OtherStdClass::class
		);
		$metadata = new Metadata("alias_name", $classes, []);
		
		$this->assertTrue($metadata->hasClass('def'));
		$this->assertTrue($metadata->hasClass('other'));
		$this->assertFalse($metadata->hasClass('wrong_class'));
	}
}
