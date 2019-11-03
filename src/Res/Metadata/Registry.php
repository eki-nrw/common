<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Metadata;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Registry implements RegistryInterface
{
	/**
	* @var MetadataInterface[]
	*/
	private $data = [];
	
	/**
	* @inheritdoc
	* 
	*/
	public function getAll()
	{
		return $this->data;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function get($alias)
	{
		if (isset($this->data[$alias]))
			return $this->data[$alias];
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getByClass($className)
	{
		foreach($this->data as $alias => $metadata)
		{
			foreach($metadata->getClasses() as $class)
			{
				if ($className === $class)	
					return $metadata;
			}
		}	
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function add(MetadataInterface $metadata)
	{
		if (isset($this->data[$metadata->getAlias()]))
			throw new \InvalidArgumentException(sprintf(
				"Already metadata with alias %s registered.", $metadata->getAlias())
			);
			
		$this->data[$metadata->getAlias()] = $metadata;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function addFrom($alias, array $configuration)
	{
		if ($alias !== null)
		{
			$classes = [];
			if (isset($configuration['classes']))
			{
				$classes = $configuration['classes'];
				unset($configuration['classes']);
			}
			$this->add(new Metadata($alias, $classes, $configuration));
		}
		else
		{
			foreach($configuration as $alias => $config)
			{
				$copyConfig = $config;
				$classes = [];
				if (isset($copyConfig['classes']))
				{
					$classes = $copyConfig['classes'];
					unset($copyConfig['classes']);
				}
				$this->add(new Metadata($alias, $classes, $copyConfig));
			}
		}
	}

	/**
	* @inheritdoc
	* 
	*/
	public function extractRegistry(array $aliases)
	{
		$registeredAliases = array_keys($this->data);
		foreach($aliases as $alias)
		{
			if (!in_array($alias, $registeredAliases))
				throw new \InvalidArgumentException(sprintf(
					"Alias '$alias' is not in registered aliases. Valid alias is one of [%s].",
				 	implode(', ', $registeredAliases)
				));
		}

		$extractedRegistry = new Registry();		
		foreach($aliases as $alias)
		{
			$metadata = $this->get($alias);
			$extractedRegistry->add(new Metadata($alias, $metadata->getClasses(), $metadata->getParameters()));
		}	
		
		return $extractedRegistry;
	}
}
