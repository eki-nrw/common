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

use Eki\NRW\Common\Participating\Participant;
use Eki\NRW\Common\Participating\ParticipantInterface;
use Eki\NRW\Common\Participating\PartnerInterface;
use Eki\NRW\Common\Participating\HasPartnerInterface;
use Eki\NRW\Common\Common\HasAttributesInterface;

use PHPUnit\Framework\TestCase;

class ParticipantTest extends TestCase
{
	public function testConstructor_atleast()
	{
		$participant = new Participant("a_role");

		$this->assertEquals($participant->getRole(), "a_role");
		$this->assertNull($participant->getName());
		
		$this->assertInstanceOf(HasPartnerInterface::class, $participant);
		$this->assertInstanceOf(HasAttributesInterface::class, $participant);
	}

	public function testConstructor_with_partner()
	{
		$partner = $this->getMockBuilder(PartnerInterface::class)
			->getMock()
		;
		
		$participant = new Participant("a_role", "a_name", $partner);

		$this->assertEquals($participant->getName(), "a_name");
		$this->assertEquals($participant->getPartner(), $partner);
	}

	public function testConstructor_has_attributes()
	{
		$attributes = array(
			'attrib_1' => 100,
			'attrib_2' => array('a'=>'A', 'b'=> 'B'),
			'attrib_3' => "a string a string",
		);
		
		$participant = new Participant("a_role", "a_name", null, $attributes);

		$this->assertEquals($participant->getAttribute('attrib_1'), 100);
		$this->assertEquals($participant->getAttribute('attrib_2'), array('a'=> 'A', 'b'=>'B'));
		$this->assertTrue(is_string($participant->getAttribute('attrib_3')));
	}

}
