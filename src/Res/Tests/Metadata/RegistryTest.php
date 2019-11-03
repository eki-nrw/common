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
use Eki\NRW\Common\Res\Metadata\RegistryInterface;
use Eki\NRW\Common\Res\Metadata\Registry;

use PHPUnit\Framework\TestCase;

use \stdClass;

class RegistryTest extends TestCase
{
	public function testFirst()
	{
		$registry = new Registry();
		
		$this->assertEmpty($registry->getAll());
	}

	public function testGet()
	{
		$registry = new Registry();
		$registry->add(new Metadata("alias_name", []));
		
		$this->assertNotNull($registry->get("alias_name"));
	}

	public function testGetMore()
	{
		$registry = new Registry();
		$registry->add(new Metadata("alias_name", []));
		
		$this->assertNull($registry->get("alias_nam"));
	}

	public function testGetByClass()
	{
		$registry = new Registry();
		$registry->add(new Metadata("alias_name", stdClass::class));
		
		$this->assertNotNull($registry->getByClass(stdClass::class));
	}

	public function testAddSimple()
	{
		$registry = new Registry();
		$registry->add(new Metadata("alias_name", []));
	}

	/**
	* @expectedException \InvalidArgumentException
	* 
	*/
	public function testAddTheSame()
	{
		$registry = new Registry();
		$registry->add(new Metadata("alias_name", []));
		$registry->add(new Metadata("alias_name", []));
	}

	/**
	* @dataProvider getConfigurationWithSpecifiedAlias
	*/
	public function testAddFromWithSpecifiedAlias($alias, array $configuration)
	{
		$registry = new Registry();
		$registry->addFrom($alias, $configuration);
	}
	
	public function getConfigurationWithSpecifiedAlias()
	{
		return [
			// data set 0
			[
				'agent',
				[
					'classes' => [],
					'key_a' => 'a',
					'key_1' => 100,
				]
			],
			
			// data set 1
			[
				'resource',
				[
					'classes' => [stdClass::class],
					'key_x' => 'xxx',
					'key_n' => 1000,
				]
			],
		];
	}

	/**
	* @dataProvider getConfigurations
	*/
	public function testAddFromWithNoSpecifiedAlias(array $configurations)
	{
		$registry = new Registry();
		$registry->addFrom(null, $configurations);
	}

	public function getConfigurations()
	{
		return [
			[
				[
					'agent' => [
						'classes' => [],
						'key_a' => 'a',
						'key_1' => 100,
					],
					'resource' => [
						'classes' => [stdClass::class],
						'key_x' => 'xxx',
						'key_n' => 1000,
					]
				],
			],

			[
				[
					'location' => [
						'classes' => [stdClass::class],
						'key_alpha' => 'alpha',
						'key_number' => 99,
					],
					'relation' => [
						'classes' => [stdClass::class],
						'key_l' => 'llll',
						'key_no' => 20,
					]
				],
			],
		];
	}

	/**
	* @dataProvider getExtractRegistryGoodData
	*/
	public function testExtractRegistry(array $configurations, array $expectedAliases)
	{
		$registry = new Registry();
		$registry->addFrom(null, $configurations);
		
		$expectRegistry = $registry->extractRegistry($expectedAliases);
		$this->assertNotNull($expectRegistry);
		$this->assertInstanceOf(Registry::class, $expectRegistry);
	}
	
	public function getExtractRegistryGoodData()
	{
		return [
			// data set 0
			[
				// $configurations
				[
					'agent' => [
						'classes' => [],
						'key_a' => 'a',
						'key_1' => 100,
					],

					'resource' => [
						'classes' => [stdClass::class],
						'key_x' => 'xxx',
						'key_n' => 1000,
					],

					'location' => [
						'classes' => [stdClass::class],
						'key_alpha' => 'alpha',
						'key_number' => 99,
					],

					'relation' => [
						'classes' => [stdClass::class],
						'key_l' => 'llll',
						'key_no' => 20,
					],
				],
								
				// $expectedAliases
				[ 
					'agent', 
					'location' 
				]
			],

			// data set 1
			[
				// $configurations
				[
					'one' => [
						'classes' => [],
						'key_a' => 'a',
						'key_1' => 100,
					],

					'two' => [
						'classes' => [stdClass::class],
						'key_x' => 'xxx',
						'key_n' => 1000,
					],

					'ten' => [
						'classes' => [stdClass::class],
						'key_alpha' => 'alpha',
						'key_number' => 99,
					],

					'nine' => [
						'classes' => [stdClass::class],
						'key_l' => 'llll',
						'key_no' => 20,
					],
				],
								
				// $expectedAliases
				[ 
					'ten', 
					'nine',
					'one' 
				]
			],
		];
	}

	/**
	* @dataProvider getExtractRegistryWrongData
	* @expectedException \InvalidArgumentException
	*/
	public function testExtractRegistryWrong(array $configurations, array $expectedAliases)
	{
		$registry = new Registry();
		$registry->addFrom(null, $configurations);
		
		$expectRegistry = $registry->extractRegistry($expectedAliases);
	}

	public function getExtractRegistryWrongData()
	{
		return [
			// data set 0
			[
				// $configurations
				[
					'agent' => [
						'classes' => [],
						'key_a' => 'a',
						'key_1' => 100,
					],

					'resource' => [
						'classes' => [stdClass::class],
						'key_x' => 'xxx',
						'key_n' => 1000,
					],

					'location' => [
						'classes' => [stdClass::class],
						'key_alpha' => 'alpha',
						'key_number' => 99,
					],

					'relation' => [
						'classes' => [stdClass::class],
						'key_l' => 'llll',
						'key_no' => 20,
					],
				],
								
				// $expectedAliases
				[ 
					'agentx', 
					'location' 
				]
			],

			// data set 1
			[
				// $configurations
				[
					'one' => [
						'classes' => [],
						'key_a' => 'a',
						'key_1' => 100,
					],

					'two' => [
						'classes' => [stdClass::class],
						'key_x' => 'xxx',
						'key_n' => 1000,
					],

					'ten' => [
						'classes' => [stdClass::class],
						'key_alpha' => 'alpha',
						'key_number' => 99,
					],

					'nine' => [
						'classes' => [stdClass::class],
						'key_l' => 'llll',
						'key_no' => 20,
					],
				],
								
				// $expectedAliases
				[ 
					'ten', 
					'nine',
					'one',
					'eleven'
				]
			],
		];
	}
}
