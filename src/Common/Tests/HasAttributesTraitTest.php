<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Tests;

use PHPUnit\Framework\TestCase;

use Eki\NRW\Common\Common\HasAttributesTrait;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class HasAttributesTraitTest extends TestCase
{
    public function testAttribute()
    {
    	$mock = $this->getMockForTrait(HasAttributesTrait::class);
    	$mock->setAttribute("an_attr_name", "This is an attribute.");
    	
    	$this->assertSame($mock->getAttribute("an_attr_name"), "This is an attribute.");
    	$this->assertTrue($mock->hasAttribute("an_attr_name"));
    }

    public function testAttributes()
    {
    	$mock = $this->getMockForTrait(HasAttributesTrait::class);
    	
    	$this->assertTrue(is_array($mock->getAttributes()));
    	$this->assertEquals(0, sizeof($mock->getAttributes()));
    	
    	$mock->setAttributes(array(
    		'one' => 'ONE',
    		'two' => 'TWO',
    		'three' => 'THREE'
    	));

    	$this->assertTrue(is_array($mock->getAttributes()));
    	$this->assertEquals(3, sizeof($mock->getAttributes()));
    }

}
