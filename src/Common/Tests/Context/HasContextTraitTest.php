<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Tests\Context;

use Eki\NRW\Common\Common\Context\ContextInterface;
use Eki\NRW\Common\Common\Context\HasContextTrait;

use PHPUnit\Framework\TestCase;

use stdClass;

class HasContextTraitTest extends TestCase
{
	public function testDefaults()
	{
		$hasContext = $this->getMockBuilder(HasContextTrait::class)->getMockForTrait();
		
		$this->assertNull($hasContext->getContext());
	}

	public function testGetSetContext()
	{
		$hasContext = $this->getMockBuilder(HasContextTrait::class)->getMockForTrait();
		
		$context = $this->getMockBuilder(ContextInterface::class)->getMock();
		$hasContext->setContext($context);
		
		$this->assertNotNull($hasContext->getContext());
	}
}
