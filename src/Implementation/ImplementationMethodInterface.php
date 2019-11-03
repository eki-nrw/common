<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Implementation;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ImplementationMethodInterface
{
	const METHOD_NAME = "name";
	const METHOD_EXPRESSION = "expression";
	const METHOD_CLASS = "class";
	const METHOD_DELEGATION_CLASS = "delegation_class";
	const METHOD_SCRIPT = "script";

	/**
	* Returns engine type
	* 
	* @return string
	*/
	public function getEngineType();
	
	/**
	* Run implementation
	* 
	* @param ImplementationInterface $implementation
	* 
	* @return mixed
	* @throws
	*/
	public function implement(ImplementationInterface $implementation);
	
	/**
	* Checks if support implementation
	* 
	* @param ImplementationInterface $implementation
	* 
	* @return bool
	*/
	public function support(ImplementationInterface $implementation);
}
