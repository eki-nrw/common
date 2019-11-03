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

use Eki\NRW\Common\Common\HasAttributesInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ElementInterface extends
	HasAttributesInterface
{
	/**
	* Returns element type
	* 
	* @return string
	*/
	public function getElementType();
	
	/**
	* Returns element name
	* 
	* @return string
	*/
	public function getElementName();
	
	/**
	* Returns element description
	* 
	* @return string
	*/
	public function getElementDescription();
	
	/**
	* Returns element container
	* 
	* @return mixed
	*/
	public function getContainer();

	/**
	* Sets element container
	* 
	* @param mixed $container
	* 
	* @return void
	*/
	public function setContainer($container);
}
