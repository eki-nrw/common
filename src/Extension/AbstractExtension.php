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
abstract class AbstractExtension implements ExtensionInterface
{
	private $className;
	
	/**
	* Constructor
	* 
	* @param string $className
	* 
	* @throws \InvalidArgumentException
	*/
	protected function __construct($className)
	{
		if (!class_exists($className))
			throw new \InvalidArgumentException(sprintf("No class %s exists.", $className));
			
		$this->className = $className;
	}
	
	/**
	* @inheritdoc
	*/
	public function support($subject, $position = null)
	{
		if (is_object($subject) && $subject instanceof $this->$className)
			return true;
	}
}
