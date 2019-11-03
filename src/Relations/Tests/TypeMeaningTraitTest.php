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
	
    public function testType()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame('domain|categorization|main|sub', $typeMeaning->getType());
    }

    public function testTypeChainIsArray()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		//$this->assertSame('domain|categorization|main|sub', $typeMeaning->getType());
		$this->assertTrue(is_array($typeMeaning->getTypeChain()));
    }

    public function testTypeChain()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame(
			'domain|categorization|main|sub', 
			implode('|', $typeMeaning->getTypeChain())
		);
    }

    public function testTypeChainMore()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame(
			'dom|cat|m|s', 
			implode('|', $typeMeaning->getTypeChain('dom|cat|m|s'))
		);
		$this->assertNotSame(
			'domain|categorization|main|sub', 
			implode('|', $typeMeaning->getTypeChain('dom|cat|m|s'))
		);
    }

    public function testRelationDomain()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame('domain', $typeMeaning->getRelationDomain());
    }

    public function testCategorizationType()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame('categorization', $typeMeaning->getCategorizationType());
    }

    public function testMainType()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame('main', $typeMeaning->getMainType());
    }

    public function testSubType()
    {
		$typeMeaning = $this->createTypeMeaning('domain|categorization|main|sub');

		$this->assertSame('sub', $typeMeaning->getSubType());
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
