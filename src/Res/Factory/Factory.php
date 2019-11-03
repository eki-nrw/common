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

use ReflectionClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Factory implements FactoryInterface
{
    /**
     * @var RegistryInterface[]
     */
    protected $registries;
    
    /**
     * Constructor
     * 
     * @param RegistryInterface[]|array|string $registries
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct($registries)
    {
    	if (is_string($registries))
    	{
    		$classname = $registries;
			if (!class_exists($classname))
				throw new \InvalidArgumentException("No class $classname exists.");
				
			$registries = array(new Registry('default', $classname));
		}
		
		if (!is_array($registries))
			throw new \InvalidArgumentException("Parameter for constructor is not array.");
    	
    	$types = [];
    	$regs = [];
    	foreach($registries as $key => $registry)
    	{
    		if (is_string($registry))
    		{
    			$type = $key;
    			$classname = $registry;

				if (!class_exists($classname))
					throw new \InvalidArgumentException(sprintf(
						"Registry classname %s that is invalid.", 
						$classname
				));

				$regs[] = new Registry($type, $classname);
				$types[] = $type;
			}
			else
			{
				if (!$registry instanceof RegistryInterface)
					throw new \InvalidArgumentException(sprintf(
						"Registry must be instance of %s. Given $s.",
						RegistryInterface::class,
						get_class($registry)
					));
				if (!class_exists($registry->getClassname()))
					throw new \InvalidArgumentException(sprintf(
						"Registry has classname %s that is invalid.", 
						$registry->getClassname()
				));
				
				$regs[] = $registry;
				$types[] = $registry->getType();
			}
		}

		if (count($types) !== count(array_unique($types)))
			throw new \InvalidArgumentException("Input registries have duplicate type.");
    	
    	foreach($regs as $reg)
    	{
    		$this->registries[$reg->getType()] = $reg;
		}
    }
    
	/**
	* @inheritdoc
	*/
	public function createNew($type = null, $args = null)
	{
		if (!$this->support($type))
			throw new \InvalidArgumentException("Factory don't support type $type.");

		$registry = $this->registries[$type];
		
		$reflection = new ReflectionClass($registry->getClassname());
		if ($args === null)
			$obj = $reflection->newInstance();
		else 
		{
			if (is_array($args))
				$obj = $reflection->newInstanceArgs($args);
			else
				$obj = $reflection->newInstance($args);
		}
		
		return $obj;
	}
	
	/**
	* @inheritdoc
	*/
	public function support($type)
	{
		if ($type === null)
		{
			if (count($this->registries) === 1)
				return true;
				
			throw new \InvalidArgumentException("Complex factory don't support null/default type.");
		}

		return in_array($type, array_keys($this->registries), TRUE);
	}
	
	/**
	* @inheritdoc
	*/
	public function extractFactory(array $types)
	{
		$registries = [];
		foreach($types as $type)
		{
			if (!isset($this->registries[$type]))
				throw new \InvalidArgumentException("No type $type to extract.");
				
			$registries[$type] = $this->registries[$type];
		}
		
		return new Factory($registries);
	}
}
