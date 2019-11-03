<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Extension;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface CreateBuilderInterface
{
	/**
	* Create builder
	* 
	* @param mixed $type
	* 
	* @return BuilderInterface
	*/
	public function createBuilder($type);
}
