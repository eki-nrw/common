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

use Eki\NRW\Common\Common\HasPropertiesTrait;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class HasPropertiesTraitTest extends TestCase
{
    public function testProperty()
    {
    	$mock = $this->getMockForTrait(HasPropertiesTrait::class);
    	$mock->setProperty("a_prop_name", "This is a property.");
    	
    	$this->assertSame($mock->getProperty("a_prop_name"), "This is a property.");
    	$this->assertTrue($mock->hasProperty("a_prop_name"));
    }

    public function testProperties()
    {
    	$mock = $this->getMockForTrait(HasPropertiesTrait::class);
    	
    	$this->assertTrue(is_array($mock->getProperties()));
    	$this->assertEquals(0, sizeof($mock->getProperties()));
    	
    	$mock->setProperties(array(
    		'one' => 'ONE',
    		'two' => 'TWO',
    		'three' => 'THREE'
    	));

    	$this->assertTrue(is_array($mock->getProperties()));
    	$this->assertEquals(3, sizeof($mock->getProperties()));
    }

}
