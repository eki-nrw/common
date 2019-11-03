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
interface RuleInterface
{
	/**
	* Gets priority
	* 
	* @return int
	*/
	public function getPriority();
	
	/**
	* Sets priority
	* 
	* @param int $priority
	* 
	* @return void
	*/
	public function setPriority($priority);
	
	/**
	* Gets expression of rule
	* 
	* @return string
	*/
	public function getExpression();
	
	/**
	* Sets expression of rule
	* 
	* @param string $expression
	* 
	* @return void
	*/
	public function setExpression($expression);
	
	/**
	* Returns the name of rule
	* 
	* @return string
	*/
	public function getName();
	
	/**
	* Sets the name of rule
	* 
	* @param string $name
	* 
	* @return void
	*/
	public function setName($name);
}
