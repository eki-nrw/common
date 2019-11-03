<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Extension\Fixtures;

use Eki\NRW\Common\Element\ElementInterface;

class ObjElement
{
	private $elements = [];
	
	public function getElement($key)
	{
		if (isset($this->elements[$key]))
			return $this->elements[$key];
	}
	
	public function setElement(ElementInterface $element)
	{
		$this->elements[$element->getElementName()] = $element;
	}
}
