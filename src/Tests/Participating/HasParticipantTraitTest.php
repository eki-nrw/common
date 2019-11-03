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

use Eki\NRW\Common\Participating\HasParticipantTrait;

use PHPUnit\Framework\TestCase;

class HasParticipantTraitTest extends TestCase
{
	public function testHasParticipant()
	{
		$hasParticipant = $this->getMockBuilder(HasParticipantTrait::class)
			->getMockForTrait()
		;
	}
}
