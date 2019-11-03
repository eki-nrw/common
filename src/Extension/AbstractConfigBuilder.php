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

//use Eki\NRW\Common\Res\Factory\FactoryInterface;
use Eki\NRW\Common\Extension\ExtensionInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractConfigBuilder implements ConfigBuilderInterface
{
	/**
	* @var object
	*/
	private $subject;
	
	/**
	* @var ExtensionInterface[]
	*/
	private $extensions = [];
	
	/**
	* Constructor
	* 
	* @param ExtensionInterface[] $extensions
	* @param FactoryInterface $factory
	* 
	*/
	public function __construct(array $extensions = [])
	{
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
	protected function getConfigSubject()
	{
		return $this->subject;
	}
	
	/**
	* Sets config subject 
	* 
	* @param mixed $subject
	* 
	* @return this
	*/
	public function setConfigSubject($subject)
	{
		$this->subject = $subject;
		
		return $this;
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
