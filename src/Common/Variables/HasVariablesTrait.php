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
trait HasVariablesTrait
{
	/**
	* @var VariablesInterface
	*/
	private $variables;
	
	/**
	* Sets a variable
	* 
	* @param VariablesInterface $variables
	* 
	* @return this
	*/
	public function setVariables(VariablesInterface $variables)
	{
		$this->variables = $variables;
		
		return $this;
	}
	
	/**
	* Returns a variable
	* 
	* @return VariablesInterface
	*/
	public function getVariables()
	{
		return $this->variables;
	}
}
