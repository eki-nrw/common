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

use Eki\NRW\Common\Compose\ObjectItem\ObjectItemTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectItemTraitTest extends TestCase
{
	private $objectItemTrait;
	
	public function setUp()
	{
		$this->objectItemTrait = $this->getMockBuilder(ObjectItemTrait::class)
			->setMethods(['validateItem'])
			->getMockForTrait()
		;

		$this->objectItemTrait->expects($this->any())
			->method('validateItem')
			->will($this->returnCallback(function($item) {
				$this->validateItem($item);
			}))
		;
	}
	
	public function tearDown()
	{
		$this->objectItemTrait = null;	
	}
	
    public function testItem()
    {
    	$objectItem = $this->objectItemTrait;

    	$objectItem->setItem(new stdClass());
    	
    	$this->assertNotNull($objectItem->getItem());
    	$this->assertTrue(is_object($objectItem->getItem()));
    }

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testItem_Wrong()
    {
    	$objectItem = $this->objectItemTrait;
    	
    	$objectItem->setItem('aaabbbccc');
    }
    
    private function validateItem($item)
    {
		if (!is_object($item))
			throw new \InvalidArgumentException("Item must be object.");	
	}
}
