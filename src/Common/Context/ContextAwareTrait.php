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
trait ContextAwareTrait
{
	/**
	* @var ContextInterface
	*/
	protected $context;
	
	/**
	* Sets a context
	* 
	* @param ContextInterface $context
	* 
	* @return this
	*/
	public function setContext(ContextInterface $context = null)
	{
		$this->context = $context;
		
		return $this;
	}
}
