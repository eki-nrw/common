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

use Eki\NRW\Common\Res\Factory\FactoryInterface;
use Eki\NRW\Common\Extension\ExtensionInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ConfigBuilder implements ConfigBuilderInterface
{
	/**
	* @var FactoryInterface
	*/
	private $factory;
	
	/**
	* @var ExtensionInterface[]
	*/
	private $extensions = [];
	
	/**
	* Constructor
	* 
	* @param FactoryInterface $factory
	* @param ExtensionInterface[] $extensions
	* 
	*/
	public function __construct(FactoryInterface $factory, array $extensions = [])
	{
		$this->factory = $factory;
		
		foreach($extensions as $extension)
		{
			if (!$extension instanceof ExtensionInterface)
				continue;
			
			$this->extensions[$extension->getExtensionName()] = $extension;		
		}
	}
	
	/**
	* @inheritdoc
	*/
	protected function getFactory()
	{
		return $this->factory;
	}

	/**
	* @inheritdoc
	*/
	public function getConfigSubject()
	{
		return $this->factory->createNew();
	}
	
	/**
	* @inheritdoc
	*/
	public function getExtensions()
	{
		return $this->extensions;
	}
	
	/**
	* Add an extension to list
	* 
	* @param ExtensionInterface $extension
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function addExtension(ExtensionInterface $extension)
	{
		if (in_array($extension->getExtensionName(), array_keys($this->extensions)))
			throw new \InvalidArgumentException(sprintf("Cannot add extension. Already an extension with name %s.", $extension->getExtensionName()));
		
		$this->extensions[$extension->getExtensionName()] = $extension;
	}
}
