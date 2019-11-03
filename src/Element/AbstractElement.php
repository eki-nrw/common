<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Element;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;
use Symfony\Component\OptionsResolver\Exception\NoSuchOptionException;
use Symfony\Component\OptionsResolver\Exception\OptionDefinitionException;
use Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractElement implements ElementInterface
{
	protected $elementName;
	protected $elementDescription;
	protected $attributes = [];
	private $container;
	
	/**
	* @var OptionsResolver
	*/
	protected $resolver;
	
	public function __construct($name, $description = '', array $attributes = [], OptionsResolver $resolver = null)
	{
		if (empty($name))
			throw new \InvalidArgumentException('Element name cannot be empty.');
		
		$this->elementName = $name;
		$this->elementDescription = $description;
		
		$resolver = new OptionsResolver();
		$this->configureElement($resolver);
		$this->resolver = $resolver;
		$this->setAttributes($attributes);
	}
	
	public function getElementName()
	{
		return $this->elementName;
	}
	
	public function getElementDescription()
	{
		return $this->elementDescription;
	}

	public function getAttributes()
	{
		return $this->attributes;
	}
	
	public function getAttribute($attrName)
	{
		if (isset($this->attributes[$attrName]))
			return $this->attributes[$attrName];
	}

	public function hasAttribute($attrName)
	{
		return isset($this->attributes[$attrName]);
	}

	/**
	* Sets an attribute
	*  
	* @param string $attrName
	* @param mixed $attrValue
	* 
	* @return void
	* 
    * @throws UndefinedOptionsException If an option name is undefined
    * @throws InvalidOptionsException   If an option doesn't fulfill the
    *                                   specified validation rules
    * @throws MissingOptionsException   If a required option is missing
    * @throws OptionDefinitionException If there is a cyclic dependency between
    *                                   lazy options and/or normalizers
    * @throws NoSuchOptionException     If a lazy option reads an unavailable option
    * @throws AccessException           If called from a lazy option or normalizer
	*/	
	public function setAttribute($attrName, $attrValue)
	{
		$this->attributes = $this->resolver->resolve(array_merge($this->attributes, array($attrName => $attrValue)));
	}
	
	/**
	* Sets all attributes
	* 
	* @param array $attributes
	* 
	* @return void
    * @throws UndefinedOptionsException If an option name is undefined
    * @throws InvalidOptionsException   If an option doesn't fulfill the
    *                                   specified validation rules
    * @throws MissingOptionsException   If a required option is missing
    * @throws OptionDefinitionException If there is a cyclic dependency between
    *                                   lazy options and/or normalizers
    * @throws NoSuchOptionException     If a lazy option reads an unavailable option
    * @throws AccessException           If called from a lazy option or normalizer
	*/
	public function setAttributes(array $attributes)
	{
		$this->attributes = $this->resolver->resolve($attributes);
	}

	/**
	* Called by constructor
	* 
	* @internal
	* 
	* @param OptionsResolver $resolver
	* 
	* @return void
	*/
	protected function configureElement(OptionsResolver $resolver)
	{
		//...
	}
	
	public function getContainer()
	{
		return $this->container;
	}
	
	public function setContainer($container)
	{
		$this->container = $container;
	}
	
	/**
	* For testing purpose only
	* 
	* @internal
	* 
	* @return OptionResolver
	*/
	public function internalGetOptionResolver()
	{
		return $this->resolver;
	}
}
