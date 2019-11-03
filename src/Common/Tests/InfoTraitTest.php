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

use Eki\NRW\Common\Common\InfoTrait;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class InfoTraitTest extends TestCase
{
    public function testAddInfoLine()
    {
    	$mock = $this->getMockForTrait(InfoTrait::class);
    	
    	$mock->addInfoLine("Line 1.");
    	$mock->addInfoLine("Line 2.");
    	$mock->addInfoLine("Line 3.");
    	
    	$this->assertSame($mock->getInfo(), "Line 1.\nLine 2.\nLine 3.\n");
    }

    public function testRemoveInfoLine()
    {
    	$mock = $this->getMockForTrait(InfoTrait::class);
    	
    	$mock->addInfoLine("Line 1.");
    	$mock->addInfoLine("Line 2.");
    	$mock->addInfoLine("Line 3.");
    	
    	$this->assertSame($mock->getInfo(), "Line 1.\nLine 2.\nLine 3.\n");
    	
    	$mock->removeInfoLine(1);

    	$this->assertSame($mock->getInfo(), "Line 1.\nLine 3.\n");
    }

    public function testRemoveAllInfoLines()
    {
    	$mock = $this->getMockForTrait(InfoTrait::class);
    	
    	$mock->addInfoLine("Line 1.");
    	$mock->addInfoLine("Line 2.");
    	$mock->addInfoLine("Line 3.");
    	$mock->addInfoLine("Line 4.");
    	
    	$mock->removeAllInfoLines();

    	$this->assertEmpty($mock->getInfo());
    }
}
