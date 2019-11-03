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

use Eki\NRW\Common\Relations\TypeMeaningInterface;
use Eki\NRW\Common\Relations\TypeMeaningTrait;

use PHPUnit\Framework\TestCase;

class TypeMeaningTraitTest extends TestCase
{
	private $defineTypeMeaning;
	private $typeMeaning;
	private $typeString = '';
	
	public function setUp()
	{
		$this->typeMeaning = $this->getMockBuilder(TypeMeaningTrait::class)
			->setMethods(['getType', 'setType'])
            ->getMockForTrait()
    	;
    	
    	$this->typeMeaning->expects($this->any())
    		->method('getType')
    		->will($this->returnCallback(function () {
    			return $this->typeString;
    		}))
    	;

    	$this->typeMeaning->expects($this->any())
    		->method('setType')
    		->will($this->returnCallback(function ($type) use (&$typeString) {
    			$this->typeString = $type;
    		}))
    	;

		$this->defineTypeMeaning = 'rea|association|member|xyz';

		$this->typeMeaning->setType($this->defineTypeMeaning);
	}
	
	public function tearDown()
	{
		$this->typeMeaning = null;
	}

	/**
	* @dataProvider getTypeChainList
	* 
	*/
    public function testTypeChainList($domain, $categorization, $mainType, $subType = '')
    {
		$typeMeaning = $this->createTypeMeaning($domain.'|'.$categorization.'|'.$mainType.'|'.$subType);

		$this->assertSame($domain, $typeMeaning->getRelationDomain());
		$this->assertSame($categorization, $typeMeaning->getCategorizationType());
		$this->assertSame($mainType, $typeMeaning->getMainType());
		$this->assertSame($subType, $typeMeaning->getSubType());
    }
    
    public function getTypeChainList()
    {
		return [
			[ 'rea', 'association', 'member'],
			[ 'rea', 'association', 'admin'],
			[ 'rea', 'association', 'partner', 'contractor'],
			[ 'rea', 'association', 'partner', 'investor'],
			[ 'business', 'active_concept', 'actor', 'manager'],
			[ 'business', 'active_concept', 'actor', 'officier'],
			[ 'business', 'active_concept', 'role'],
			[ 'business', 'active_concept', 'collaboration'],
			[ 'domain', 'categorization', 'main_type', 'sub_type']
		];
	}
	
    public function testTypeChain()
    {
		$typeMeaning = $this->typeMeaning;

		$this->assertSame($this->defineTypeMeaning, $typeMeaning->getType());
    }

    public function testRelationDomain()
    {
		$typeMeaning = $this->typeMeaning;

		$this->assertSame('rea', $typeMeaning->getRelationDomain());
    }

    public function testCategorizationType()
    {
		$typeMeaning = $this->typeMeaning;

		$this->assertSame('association', $typeMeaning->getCategorizationType());
    }

    public function testMainType()
    {
		$typeMeaning = $this->typeMeaning;

		$this->assertSame('member', $typeMeaning->getMainType());
    }

    public function testSubType()
    {
		$typeMeaning = $this->typeMeaning;

		$this->assertSame('xyz', $typeMeaning->getSubType());
    }

	private function createTypeMeaning($initTypeString = '')
	{
		$typeString = $initTypeString;
		$typeMeaning = $this->getMockBuilder(TypeMeaningTrait::class)
			->setMethods(['getType', 'setType'])
            ->getMockForTrait()
    	;
    	
    	$typeMeaning->expects($this->any())
    		->method('getType')
    		->will($this->returnCallback(function () use (&$typeString) {
    			return $typeString;
    		}))
    	;

    	$typeMeaning->expects($this->any())
    		->method('setType')
    		->will($this->returnCallback(function ($type) use (&$typeString) {
    			$typeString = $type;
    		}))
    	;
    	
    	return $typeMeaning;
	}

}
