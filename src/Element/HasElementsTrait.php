<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\ELement;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait HasElementsTrait
{
	protected $elements = [];
	
	/**
	* @inheritdoc
	*/
	public function hasElement($elementName)
	{
		return isset($this->elements[$elementName]);
	}

	/**
	* @inheritdoc
	*/
	public function hasElementType($elementType)
	{
		foreach($this->elements as $element)
		{
			if ($element->getElementType() === $elementType)
				return true;
		}
	}

	/**
	* @inheritdoc
	*/
	public function getElement($elementName)
	{
		if (isset($this->elements[$elementName]))
			return $this->elements[$elementName];
	}

	/**
	* @inheritdoc
	*/
	public function setElement(ElementInterface $element)
	{
		$this->elements[$element->getElementName()] = $element;
		$element->setContainer($this);
	}
}
