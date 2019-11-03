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

use Eki\NRW\Common\Common\DocumentationTrait;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class DocumentationTraitTest extends TestCase
{
    public function testShortDescription()
    {
    	$mock = $this->getMockForTrait(DocumentationTrait::class);
    	
    	$mock->setDescription("This is a short description.");
    	
    	$this->assertSame($mock->getDescription(), "This is a short description.");
    }

    public function testDescription()
    {
    	$mock = $this->getMockForTrait(DocumentationTrait::class);
    	
    	$mock->setDescription(
    		"<p>" . 
    		"Description is long than short description, of course.<br />" .
    		"Description is long than short description, of course.</p>"
    	);
    	
    	$this->assertSame($mock->getDescription(), 
    		"<p>" . 
    		"Description is long than short description, of course.<br />" .
    		"Description is long than short description, of course.</p>"
    	);
    }

    public function testNote()
    {
    	$mock = $this->getMockForTrait(DocumentationTrait::class);
    	
    	$mock->setNote("This is a note.");
    	
    	$this->assertSame($mock->getNote(), "This is a note.");
    }
}
