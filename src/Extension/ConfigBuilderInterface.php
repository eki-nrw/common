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

use Eki\NRW\Common\Res\Factory\FactoryInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ConfigBuilderInterface
{
	/**
	* Returns factory to create new object
	* 
	* @return FactoryInterface
	*/
	//public function getFactory();

	/**
	* Sets config subject
	* 
	* @param object $subject
	* 
	* @return object
	*/
	public function setConfigSubject($subject);
	
	/**
	* Gets all extension
	* 
	* @return ExtensionInterface[]
	*/
	public function getExtensions();
}
