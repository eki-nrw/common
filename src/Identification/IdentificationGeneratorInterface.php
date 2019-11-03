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
interface IdentificationGeneratorInterface
{
	/**
	* Generates an identification for object
	* 
	* @param IdentificationTypeInterface $identificationType
	* @param object|null $obj
	* 
	* @return IdentificationInterface
	*/
	public function generateIdentification(IdentificationTypeInterface $identificationType, $obj = null);
}
