<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Compose\ObjectItemSource;

use Eki\NRW\Common\Compose\ObjectItemSource\ObjectItemSourceInterface;
use Eki\NRW\Common\Compose\ObjectItemSource\ObjectItemSourceTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectItemSourceTraitTest extends TestCase
{
    public function testSourceType()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceType('a_source_type');
		
		$this->assertSame('a_source_type', $objectItemSourceTrait->getSourceType());
    }
    
	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testSourceType_Object()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceType(new stdClass());
    }

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testSourceType_Number()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceType(100);
    }
    
    public function testSourceObject()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
    	$obj = new stdClass();
		$objectItemSourceTrait->setSourceObject($obj);
		
		$this->assertNotNull($objectItemSourceTrait->getSourceObject());
		$this->assertEquals($obj, $objectItemSourceTrait->getSourceObject());
    }
    
	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testSourceObject_NotObject()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceObject('ahsafdsahlkfdsa');
    }

    public function testSourceMethod()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceMethod('a_source_method');
		
		$this->assertSame('a_source_method', $objectItemSourceTrait->getSourceMethod());
    }
    
	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testSourceMethod_Object()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceMethod(new stdClass());
    }

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testSourceMethod_Number()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceMethod(99);
    }

    public function testSourceSpecifications()
    {
    	$objectItemSourceTrait = $this->getMockBuilder(ObjectItemSourceTrait::class)
    		->getMockForTrait()
    	;
    	
		$objectItemSourceTrait->setSourceSpecifications(array('one' => 1, 'two' => 2, 'three' => '3'));
		
		$this->assertEquals(
			array('one' => 1, 'two' => 2, 'three' => '3'), 
			$objectItemSourceTrait->getSourceSpecifications()
		);
    }
    
}
