<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Variables;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait VariablesTrait
{
	private $variables = [];
	
	/**
	* Get a variable
	* 
	* @param string $variableName
	* 
	* @return mixed
	*/
	public function get($variableName)
	{
		if (isset($this->variables[$variableName]))
			return $this->variables[$variableName];
	}
	
	/**
	* Checks if a variable exits or not
	* 
	* @param string $variableName
	* 
	* @return bool
	*/
	public function has($variableName)
	{
		return isset($this->variables[$variableName]);
	}
	
	/**
	* Set avariable
	* 
	* @param string $variableName
	* @param mixed $variableValue
	* 
	* @return
	*/
	public function set($variableName, $variableValue)
	{
		$this->variables[$variableName] = $variableValue;
	}
	
	/**
	* Gets all variables
	* 
	* @return array
	*/
	public function getAll()
	{
		return $this->variables;
	}
	
	/**
	* Sets all variables
	* 
	* @param array $variables
	* 
	* @return
	*/
	public function setAll(array $variables)
	{
		$this->variables = [];
		foreach($variables as $variableName => $variableValue)
		{
			$this->variables[$variableName] = $variableValue;
		}
	}
}
