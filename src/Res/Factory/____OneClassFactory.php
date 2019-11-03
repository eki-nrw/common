<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Factory;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class OneClassFactory extends Factory
{
	/**
	* Constructor
	* 
	* @param string $className
	* @param array $types
	* 
	* @throws \InvalidArgumentException
	*/
	public function __construct($className, array $types = [])
	{
		if (!class_exists($className))
			throw new \InvalidArgumentException(sprintf('No class %s exists.', $className));
			
		$regs = [];
		foreach($types as $type)
		{
			if (!is_string($type))
				throw new \InvalidArgumentException(sprintf('Type %s must be string. Given %s.', $type, gettype($type)));

			$regs[$type] = $className;
		}

		parent::__construct($regs);			
	}
}
