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
class DelegateFactory implements FactoryInterface
{
	/**
	* @var FactoryInterface[]
	*/
	private $factories;

	public function __construct(array $factories)
	{
		foreach($factories as $factory)
		{
			if (!$factory instanceof FactoryInterface)
				throw new \InvalidArgumentException(sprintf(
					"Factory must be instance of %s. Given %s.",
					FactoryInterface::class, get_class($factory)
				));
				
			$this->factories[] = $factory;
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function createNew($type = null, $args = null)
	{
		foreach($this->factories as $factory)
		{
			if ($factory->support($type))
			{
				return $factory->createNew($type, $args);
			}
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function support($type)
	{
		foreach($this->factories as $factory)
		{
			if ($factory->support($type))
				return true;
		}
		
		return false;
	}
	
	/**
	* @inheritdoc
	*/
	public function extractFactory(array $types)
	{
		$extractedFactories = [];
		foreach($types as $type)
		{
			$suported = false;
			foreach($this->factories as $factory)
			{
				if ($factory->support($type))
				{
					$extractedFactories[] = $factory;
					$suported = true;
					break;
				}
			}
			
			if (!$suported)
				throw new \InvalidArgumentException("No type $type to extract.");
		}
		
		return new DelegateFactory($extractedFactories);
	}
}
