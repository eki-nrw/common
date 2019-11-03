<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Compose\ObjectItem;

use Eki\NRW\Common\Compose\ObjectItem\ObjectItemInterface;
use Eki\NRW\Common\Compose\ObjectItem\ObjectItemsAwareTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectItemsAwareTraitTest extends TestCase
{
	private $objectItemsAwareTrait;
	
    public function setUp()
    {
    	$this->objectItemsAwareTrait = $this->getMockBuilder(ObjectItemsAwareTrait::class)
    		->setMethods(['validateObjectItem'])
    		->getMockForTrait()
    	;

    	$this->objectItemsAwareTrait->expects($this->any())
			->method('validateObjectItem')
			->will($this->returnCallback(function($objectItem) {
				$this->validateObjectItem($objectItem);
			}))
		;
    }
    
    public function tearDown()
    {
		$this->objectItemsAwareTrait = null;
	}

	public function testEmpty()
	{
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$this->assertEmpty($objectItems->getObjectItems());
	}

    public function testSetObjectItemsThenReset()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$objectItems->setObjectItems(array(
    		'key_1' => $this->getMockBuilder(ObjectItemInterface::class)->getMock(),
    		'key_2' => $this->getMockBuilder(ObjectItemInterface::class)->getMock(),
    		'key_3' => $this->getMockBuilder(ObjectItemInterface::class)->getMock(),
    	));
    	
    	$objectItems->setObjectItems(array());
	}
	
    public function testAddObjectItem()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
		$objectItems->addObjectItem(
			$this->getMockBuilder(ObjectItemInterface::class)->getMock(),
			'a_key'
		);    	
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testAddObjectItem_KeyMustBeSpecified()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
		$objectItems->addObjectItem(
			$this->getMockBuilder(ObjectItemInterface::class)->getMock(),
			null
		);    	
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testAddObjectItem_CannotDoubleAddTheSameKey()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
		$objectItems->addObjectItem(
			$this->getMockBuilder(ObjectItemInterface::class)->getMock(),
			'the_key'
		);    	

		$objectItems->addObjectItem(
			$this->getMockBuilder(ObjectItemInterface::class)->getMock(),
			'the_key'
		);    	
	}

    public function testRemoveObjectItem()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$removedObjectLater = $this->getMockBuilder(ObjectItemInterface::class)->getMock();
    	
		$objectItems->addObjectItem($removedObjectLater, 'removed_later');
		
		$objectItems->removeObjectItem($removedObjectLater);
	}

    public function testRemoveObjectItemByKey()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$removedObjectLater = $this->getMockBuilder(ObjectItemInterface::class)->getMock();
    	
		$objectItems->addObjectItem($removedObjectLater, 'removed_later');
		
		$objectItems->removeObjectItemByKey('removed_later');
	}

    public function testGetObjectItem()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$object_for_get_later = $this->getMockBuilder(ObjectItemInterface::class)->getMock();
    	
		$objectItems->addObjectItem($object_for_get_later, 'object_for_get_later');
		
		$this->assertEquals($object_for_get_later, $objectItems->getObjectItem('object_for_get_later'));
	}

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testGetObjectItem_WrongKey()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$objectItems->getObjectItem(str_shuffle('abcdefgh'));
	}

    public function testHasObjectItem()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$object_for_check_later = $this->getMockBuilder(ObjectItemInterface::class)->getMock();
    	
		$objectItems->addObjectItem($object_for_check_later, 'object_for_check_later');
		
		$this->assertTrue($objectItems->hasObjectItem('object_for_check_later'));
	}

    public function testHasObjectItem_WrongKey()
    {
    	$objectItems = $this->objectItemsAwareTrait;
    	
    	$this->assertFalse($objectItems->hasObjectItem(str_shuffle('abcdefgh')));
	}
	
    private function validateObjectItem($objectItem)
    {
	}
}
