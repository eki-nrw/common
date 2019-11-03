<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Location;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface CoordinateValidatorInterface
{
	/**
	* Checks if support the given coordination type
	* 
	* @param string $type Type of coodinates
	* 
	* @return bool
	*/
	public function support($type);

	/**
	* Validate the given coordinate
	* 
	* @param string $key
	* @param mixed $coordinate
	* @param $type|null Type of coordinates
	* 
	* @return void
	* 
	* @throws \InvalidArgumentException
	*/
	public function validate($key, $coordinate, $type);
}
