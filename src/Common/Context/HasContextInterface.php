<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Context;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasContextInterface extends ContextAwareInterface
{
	/**
	* Returns a context
	* 
	* @return ContextInterface
	*/
	public function getContext();
}
