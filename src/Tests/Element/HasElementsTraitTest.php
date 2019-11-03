<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Element;

use PHPUnit\Framework\TestCase;

use Eki\NRW\Common\Element\HasElementsTrait;
use Eki\NRW\Common\Element\ElementInterface;

class HasElementsTraitTest extends TestCase
{
    public function testElement()
    {
    	$mock = $this->getMockForTrait(HasElementsTrait::class);
    	
    	$mock_element = $this->getMockBuilder(ElementInterface::class)->getMock();
    	$mock_element->expects($this->once())
    		->method('getElementName')
    		->will($this->returnValue("element_name"));
    	;
    	
    	$mock->setElement($mock_element);
    	
    	$this->assertTrue($mock->hasElement("element_name"));
    	$this->assertNotNull($mock->getElement("element_name"));
    	$this->assertFalse($mock->hasElement("dskjfkjdskfjk"));
    }
}
