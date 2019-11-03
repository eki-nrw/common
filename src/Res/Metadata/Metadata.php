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
class Metadata implements MetadataInterface
{
	const NAME_DEFAULT = "default";
	
	/**
	* @var string
	*/
	private $alias;

	/**
	* @var array
	*/	
	private $classes;

	/**
	* @var array
	*/	
	private $parameters;

	/**
	* Constructor
	* 
	* @param string $alias
	* @param string[]|string $classes
	* @param array $parameters
	* 
	* @return
	*/
	public function __construct($alias, $classes, array $parameters = array())
	{
		if (empty($alias))
			throw new \InvalidArgumentException("'alias' parameter must be not empty string.");
		if (!is_string($alias))
			throw new \InvalidArgumentException(sprintf("'alias' parameter must be string. Given %s.", gettype($alias)));

		$this->parameters = $parameters;		
			
		if (is_string($classes))
			$classes = array($this->getDefaultName() => $classes);
		
		if (!is_array($classes))
			throw new \InvalidArgumentException(sprintf("'classes' parameter must be array. Given %s.", gettype($classes)));
		
		foreach($classes as $key => $class)
		{
			if (!class_exists($class))
				throw new \InvalidArgumentException(sprintf("Class %s of key '$key' not exists.", $class));
		}

		$this->alias = $alias;
		$this->classes = $classes;	
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getAlias()
	{
		return $this->alias;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getParameter($name)
	{
		if (isset($this->parameters[$name]))
			return $this->parameters[$name];
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getParameters()
	{
		return $this->parameters;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function hasParameter($name)
	{
		return isset($this->parameters[$name]);
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getClass($name = null)
	{
		if (null === $name)
			$name = $this->getDefaultName();
			
		if (isset($this->classes[$name]))
			return $this->classes[$name];
	}
	
	/**
	* Returns default name of class
	* 
	* @return string
	*/
	public function getDefaultName()
	{
		if ($this->hasParameter("default_name"))
		{
			$name = $this->getParameter("default_name");
			
			if (!empty($name))
				return $name;
		}
		
		return static::NAME_DEFAULT;
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getClasses()
	{
		return $this->classes;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function hasClass($name)
	{
		return isset($this->classes[$name]);
	}
}
