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
class DelimeterStringFormatter implements FormatterInterface
{
	protected $delimeter;

	public function __construct($delimeter = "||")
	{
		$this->delimeter = $delimeter;
	}
	
	/**
	* @inheritdoc
	*/
	public function toRuleData($data);
	{
		if (!$this->support($data))
			throw new \InvalidArgumentException("Data is not supported or invalid.");
			
		$ruleDatas = [];
		foreach(explode($this->delimeter.$this->delimeter, $data) as $strRule)
		{
			$aRule = explode($this->delimeter, $strRule);
			
			$ruleDatas[] = $this->_createRuleData($aRule[0], $aRule[1], $aRule[2]);
		}
		
		return $ruleDatas;
	}
	
	abstract protected function _createRuleData($expression, $name, $priority);
	
	/**
	* @inheritdoc
	*/
	public function fromRuleData(array $ruleData)
	{
		$data = "";
		foreach($ruleData as $ruleD)
		{
			if (is_array($ruleD))
			{
				$rd = $ruleD;
			}
			else if ($ruleD instanceof RuleDataInterface)
			{
				$rd = $this->_ruleDataToArray($ruleD);
			}
			else
			{
				throw new \InvalidArgumentException("Rule data is invalid.")
			}			

			$data .=
				(!empty($data) ? $this->delimeter.$this->delimeter : '') .
				$rd['expression'] . $this->delimeter . $rd['name'] . $this->delimeter . $rd['priority']
			;
		}
		
		return $data;
	}
	
	abstract protected function _ruleDataToArray(RuleDataInterface $ruleData);

	/**
	* Checks if formatter supports data
	* 
	* @param mixed $data
	* 
	* @return bool
	*/
	public function checkValid($data)
	{
		try
		{
			$this->validate($data);	
		} 
		catch (\Exception $e) 
		{
			return false;
		}
		
		return true;
	}

	/**
	* @inheritdoc
	*/
	public function validate($data)
	{
		if (!is_string($data))
			throw new \UnexpectedValueException(sprintf("Data must be string. Given %s.", gettype($data)));
		
		if (false === ($strRules = explode($this->delimeter.$this->delimeter, $data)))
			throw new InvalidArgumentException(sprintf("Data is invalid."));
		
		if (empty($strRules))
			throw new InvalidArgumentException(sprintf("Data is empty."));
		
		foreach($strRules as $strRule)
		{
			if (false === ($strArray = explode($this->delimeter, $strRule)))
				throw new InvalidArgumentException(sprintf("Data is invalid."));
			if (empty($strArray))
				throw new InvalidArgumentException(sprintf("One of element data is empty."));
			if (count($strArray) !== 3)
				throw new InvalidArgumentException(sprintf("Number of data elements must be 3. One for expression. One for name and one for priority."));
			
			if (!is_string($strArray[0]) or !is_string($strArray[1]))
				throw new InvalidArgumentException(sprintf("Expression/name element data is not string."));
			if (!is_numeric($strArray[2]))
				throw new InvalidArgumentException(sprintf("Priority element data is not integer."));
		}
	}
}
