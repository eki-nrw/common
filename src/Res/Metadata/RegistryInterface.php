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
interface RegistryInterface
{
	/**
	* Return all registry
	* 
	* @return MetadataInterface[]
	*/
	public function getAll();
	
	/**
	* Returns the given registry by alias
	* 
	* @param string $alias
	* 
	* @return MetadataInterface|null
	*/
	public function get($alias);
	
	/**
	* Gets the metadata of the given class
	* 
	* @param string $className
	* 
	* @return MetadataInterface|null
	*/
	public function getByClass($className);
	
	/**
	* Register a metadata
	* 
	* @param MetadataInterface $metadata
	* 
	* @return void
	* 
	* @throws
	*/
	public function add(MetadataInterface $metadata);
	
	/**
	* Register a metadata by configuration
	* 
	* @param string $alias
	* @param array $configuration
	* 
	* @return void
	* 
	* @throws
	*/
	public function addFrom($alias, array $configuration);
	
	/**
	* Extract the registry to a registry that contains only given aliaseds
	* 
	* @param array $aliases
	* 
	* @return RegistryInterface
	* 
	* @throws \InvalidArgumentException
	*/
	public function extractRegistry(array $aliases);
}
