<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Implementation;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractNameMethod implements ImplementationMethodInterface
{
	/**
	* @inheritdoc
	*/
	public function getMethodType()
	{
		return ImplementationMethodInterface::METHOD_NAME;
	}
	
	/**
	* @inheritdoc
	*/
	public function implement(ImplementationInterface $implementation)
	{
		return $this->getResult($implementation->getDefinition());
	}
	
	/**
	* Returns result from name
	* 
	* @param string $name
	* 
	* @return mixed
	*/
	abstract protected function getResult($name);
}
