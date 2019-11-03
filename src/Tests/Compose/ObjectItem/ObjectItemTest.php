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
use Eki\NRW\Common\Compose\ObjectItem\ObjectItem;
use Eki\NRW\Common\QuantityValue\QuantityValue;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectItemTest extends TestCase
{
    public function testObjectDefault()
    {
    	$objectItem = new ObjectItem();
    	
		$this->assertNull($objectItem->getItem());
		$this->assertNull($objectItem->getQuantityValue());
		$this->assertEmpty($objectItem->getSpecifications());
    }

    public function testObjectItem()
    {
    	$objectItem = new ObjectItem();
    	$quantityValue = new QuantityValue(99, "each");
    	
    	$item = new stdClass();
    	$objectItem->setItem($item);
    	$objectItem->setQuantityValue($quantityValue);
    	
		$this->assertSame($objectItem->getItem(), $item);
		$this->assertSame($objectItem->getQuantityValue()->__toString(), "99 each");
    }
}
