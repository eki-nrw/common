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
class Rule implements RuleInterface
{
	private $priority;
	private $expression;
	private $name; 

	/**
	* Constructor
	* 
	* @param string $expression
	* @param int $priority
	* 
	*/
	public function __construct($expression, $name = '', $priority = 0)
	{
		if (empty($expression))
			throw new \InvalidArgumentException("Expression must be not empty.");
		if (!is_string($expression))
			throw new \InvalidArgumentException("Expression must be string.");
		if (!is_int($priority))
			throw new \InvalidArgumentException("Priority must be integer.");
		
		$this->expression = $expression;
		$this->name = $name;
		$this->priority = $priority;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getPriority()
	{
		return $this->priority;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setPriority($priority)
	{
		$this->priority = $priority;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getExpression()
	{
		return $this->expression;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setExpression($expression)
	{
		$this->expression = $expression;
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getName()
	{
		return $this->name;
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setName($name)
	{
		$this->name = $name;
	}
}
