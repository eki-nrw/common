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
class Registry implements RegistryInterface
{
	protected $type;
	protected $classname;
	
	/**
	* Constructor
	* 
	* @param string $type
	* @param atring $classname
	* 
	* @return void
	*/
	public function __construct($type, $classname)
	{
		if (!class_exists($classname))
			throw new \InvalidArgumentException("Registry classname $classname invalid.");
		
		$this->type = $type;
		$this->classname = $classname;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function getClassname()
	{
		return $this->classname;
	}
}
