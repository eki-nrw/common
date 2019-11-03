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

use Eki\NRW\Common\Common\HasOptionsTrait;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class HasOptionsTraitTest extends TestCase
{
    public function testOption()
    {
    	$mock = $this->getMockForTrait(HasOptionsTrait::class);
    	$mock->setOption("an_opt_name", "This is an option.");
    	
    	$this->assertSame($mock->getOption("an_opt_name"), "This is an option.");
    	$this->assertTrue($mock->hasOption("an_opt_name"));
    }

    public function testOptions()
    {
    	$mock = $this->getMockForTrait(HasOptionsTrait::class);
    	
    	$this->assertTrue(is_array($mock->getOptions()));
    	$this->assertEquals(0, sizeof($mock->getOptions()));
    	
    	$mock->setOptions(array(
    		'one' => 'ONE',
    		'two' => 'TWO',
    		'three' => 'THREE'
    	));

    	$this->assertTrue(is_array($mock->getOptions()));
    	$this->assertEquals(3, sizeof($mock->getOptions()));
    }

}
