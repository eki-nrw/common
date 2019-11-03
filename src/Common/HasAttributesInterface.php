<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasAttributesInterface
{
	public function getAttributes();
	public function getAttribute($attrName);
	public function hasAttribute($attrName);
	public function setAttribute($attrName, $attrValue);
	public function setAttributes(array $attributes);
}
