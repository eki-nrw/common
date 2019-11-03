<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Participating;

use Eki\NRW\Common\Participating\HasPartnerTrait;

use PHPUnit\Framework\TestCase;

class HasPartnerTraitTest extends TestCase
{
	public function testHasPartner()
	{
		$hasPartner = $this->getMockBuilder(HasPartnerTrait::class)
			->getMockForTrait()
		;
	}
}
