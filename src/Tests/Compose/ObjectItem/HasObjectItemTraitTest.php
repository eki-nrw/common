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
use Eki\NRW\Common\Compose\ObjectItem\HasObjectItemTrait;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class HasObjectItemTraitTest extends TestCase
{
	private $container;
	
    public function setUp()
    {
    	$this->container = $this->getMockBuilder(HasObjectItemTrait::class)
    		->setMethods(['validateObjectItem'])
    		->getMockForTrait()
    	;
    	
    	$this->container->expects($this->any())
			->method('validateObjectItem')
			->will($this->returnCallback(function($objectItem) {
				$this->validateObjectItem($objectItem);
			}))
		;
    }
    
    public function tearDown()
    {
		$this->container = null;
	}
	
    public function testObjectItem()
    {
    	$container = $this->container;
    	
    	$objectItem = $this->getMockBuilder(ObjectItemInterface::class)
    		->setMethods(['foo'])
    		->getMockForAbstractClass()
    	;
    	$objectItem->expects($this->once())
    		->method('foo')
    		->will($this->returnValue(null))
    	;

		$objectItem->foo();
    	$container->setObjectItem($objectItem);
    	
    	$this->assertNotNull($container->getObjectItem());
    }

	/**
	* @expectedException \InvalidArgumentException
	*/
    public function testObjectItem_Wrong()
    {
    	$container = $this->container;
    	
    	$objectItem = $this->getMockBuilder(ObjectItemInterface::class)->getMock();
    	
    	$container->setObjectItem($objectItem);
    }

    private function validateObjectItem($objectItem)
    {
    	if (!method_exists($objectItem, 'foo'))
    	{
    		throw new \InvalidArgumentException("No foo method.");
		}
	}
}
