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
abstract class AbstractClassMethod implements ImplementationMethodInterface
{
	/**
	* @inheritdoc
	*/
	public function getMethodType()
	{
		return ImplementationMethodInterface::METHOD_CLASS;
	}
	
	/**
	* @inheritdoc
	*/
	public function implement(ImplementationInterface $implementation)
	{
		$className = $implementation->getDefinition();
		if (!class_exist($className))
			throw new \InvalidArgumentException(sprintf("Implementation class %s not exists.", $className));
			
		return $className();
	}
}
