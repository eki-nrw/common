<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Identification;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface HasIdentificationInterface
{
	/**
	* Returns the identification
	* 
	* @return IdentificationInterface
	*/
	public function getIdentification();
	
	/**
	* Sets identification 
	* 
	* @param IdentificationInterface $identification
	* 
	* @return void
	*/
	public function setIdenticiation(IdentificationInterface $identification);
}
