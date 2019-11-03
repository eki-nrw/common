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

use ReflectionClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractDelegationClassMethod implements ImplementationMethodInterface
{
	/**
	* @inheritdoc
	*/
	public function getMethodType()
	{
		return ImplementationMethodInterface::METHOD_DELEGATION_CLASS;
	}
	
	/**
	* @inheritdoc
	*/
	public function implement(ImplementationInterface $implementation)
	{
		$className = $implementation->getDefinition();
		
		if (!class_exist($className))
			throw new \InvalidArgumentException(sprintf("Implementation class %s not exists.", $className));
			
		$reflection = new ReflectionClass($implementation);
		if (!$reflection->implementsInterface("Eki\NRW\Mdl\Working\Implementation\DelegationClassInterface"))
			throw new \InvalidArgumentException(sprintf("Implementation must implement interface '%s'", 
				"Eki\NRW\Mdl\Working\Implementation\DelegationClassInterface"));
			
		$delegationObject = $className();
		return $delegationObject->run($this->getDelegationSystem());
	}
	
	/**
	* Get delegation system
	* 
	* 
	* @return DelegationSystemInterface
	*/
	abstract protected function getDelegationSystem();
}
