<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Rule;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ArrayRuleData implements RuleDataInterface
{
	/**
	* @var array
	*/
	private $ruleData;
	
	public function __construct($expression, $name = '', $priority = 0)
	{
		$this->setData(array(
			'expression' => $expression,
			'name' => $name,
			'priority' => $priority
		));	
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getData()
	{
		return $this->ruleData;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setData($ruleData)
	{
		$this->validate($ruleData);
		
		$this->ruleData = $ruleData;	
	}

	/**
	* @inheritdoc
	* 
	*/
	public function validate($ruleData)
	{
		if (!is_array($ruleData))
			throw new \InvalidArgumentException("Array Rule Data must be array.");
			
		if (!isset($ruleData['expression']))
			throw new \InvalidArgumentException("Array Rule Data has no 'expression' index.");
		if (!isset($ruleData['name']))
			throw new \InvalidArgumentException("Array Rule Data has no 'name' index.");
		if (!isset($ruleData['priority']))
			throw new \InvalidArgumentException("Array Rule Data has no 'priority' index.");
			
		if (!is_string($ruleData['expression']) or !is_string($ruleData['name']))
			throw new \InvalidArgumentException("Expression/name element data is not string.");
		if (!is_numeric($ruleData['expression']))	
			throw new \InvalidArgumentException("Priority element data is not integer.");
	}
}
