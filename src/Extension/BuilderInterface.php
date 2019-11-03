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

use Eki\NRW\Common\Element\ElementInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface BuilderInterface extends
	ConfigBuilderInterface
{
	/**
	* Sets name for object
	* 
	* @param string $name
	* 
	* @return this
	*/
	public function setName($name);
	
	/**
	* Add a property
	* 
	* @param string $propertyName
	* @param array $propertyValue
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	*/
	public function addProperty($propertyName, array $propertyValue, array $contexts = []);
	
	/**
	* Set a value to a property
	* 
	* @param string $propertyName
	* @param array $propertyValue
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	*/
	public function setProperty($propertyName, array $propertyValue);
	
	/**
	* Add an option
	* 
	* @param string $optionName
	* @param array $optionValue
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	*/
	public function addOption($optionName, array $optionValue, array $contexts = []);

	/**
	* Set a value to an option
	* 
	* @param string $optionName
	* @param array $optionValue
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	*/
	public function setOption($optionName, array $optionValue);
	
	/**
	* Sets an attribute
	* 
	* @param string $attrName
	* @param mixed $attrValue
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	*/
	public function setAttribute($attrName, $attrValue, array $contexts = []);

	/**
	* Add an element
	* 
	* @param ElementInterface $element
	* 
	* @return this
	* @throws \LogicException
	*/
	public function addElement(ElementInterface $element);

	/**
	* Set a data object of resource type
	* 
	* @param string $name
	* @param mixed $data
	* @param array $contexts
	* 
	* @return this
	* @throws \LogicException
	* @throws \InvalideArgumentException
	*/
	public function setData($name, $data, array $contexts = []);

	/**
	* Set object has properties or not
	* 
	* @return this
	*/
	public function objectHasProperties();
	
	/**
	* Set object has options or not
	* 
	* @return this
	*/
	public function objectHasOptions();

	/**
	* Set object has attributes or not
	* 
	* @return this
	*/
	public function objectHasAttributes();
	
	/**
	* Build and returns object
	* 
	* @return object
	* 
	* @throws \UnexpectedValueException
	* @throws \DomainException
	*/
	public function get();
}
