<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Element;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasElementsInterface
{
	public function hasElement($elementName);
	public function hasElementType($elementType);
	public function getElement($elementName);
	public function setElement(ElementInterface $element);
}
