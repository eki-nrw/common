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
use Eki\NRW\Common\Compose\ObjectItemSource\ObjectItemSource;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ObjectItemSourceTest extends TestCase
{
    public function testInterfaces()
    {
    	$objectItemSource = $this->getMockBuilder(ObjectItemSource::class)->getMock();

		$this->assertInstanceOf(ObjectItemSourceInterface::class, $objectItemSource);
    }
}
