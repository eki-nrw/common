<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Tests\Variables;

use Eki\NRW\Common\Common\Variables\VariablesInterface;
use Eki\NRW\Common\Common\Variables\HasVariablesTrait;

use PHPUnit\Framework\TestCase;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class HasVariablesTraitTest extends TestCase
{
    public function testSetVariables()
    {
    	$mock = $this->getMockForTrait(HasVariablesTrait::class);
    	$mock->setVariables($this->createVariables());
    }
    
    public function testGetVariables()
    {
    	$mock = $this->getMockForTrait(HasVariablesTrait::class);
    	$variables = $this->createVariables();
    	$mock->setVariables($variables);
    	$this->assertSame($variables, $mock->getVariables());
    }
	
    private function createVariables()
    {
		$variables = $this->getMockBuilder(VariablesInterface::class)
			->getMockForAbstractClass()
		;
		
		return $variables;
	}
}
