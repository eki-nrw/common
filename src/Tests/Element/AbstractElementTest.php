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

use Eki\NRW\Common\Element\AbstractElement;
use Eki\NRW\Common\Element\ElementInterface;

use PHPUnit\Framework\TestCase;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;
use Symfony\Component\OptionsResolver\Exception\NoSuchOptionException;
use Symfony\Component\OptionsResolver\Exception\OptionDefinitionException;
use Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException;

class AbstractElementTest extends TestCase
{
	public function testNoConstructor()
	{
		$mock = $this->getMockBuilder(AbstractElement::class)
			->disableOriginalConstructor()
			->getMockForAbstractClass()
		;
	}

	public function testConstructor_at_least()
	{
		$mock = $this->getMockBuilder(AbstractElement::class)
			->setConstructorArgs(array('element_name'))
			->getMockForAbstractClass()
		;
	}

	/**
    * @expectedException \InvalidArgumentException
	*/
	public function testConstructor_name_cannot_be_null()
	{
		$mock = $this->getMockBuilder(AbstractElement::class)
			->setConstructorArgs(array(null))
			->getMockForAbstractClass()
		;
	}

	/**
    * @expectedException Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException
	*/
	public function testUndefinedOptions()
	{
		$mock = $this->getMockBuilder(AbstractElement::class)
			->setConstructorArgs(array('element_name'))
			->getMockForAbstractClass()
		;

		$resolver = $mock->internalGetOptionResolver();
		$resolver->setRequired('x');
		
		$mock->setAttribute('x', 'XXX');		
		$mock->setAttribute('a', 100);		
	}
}
