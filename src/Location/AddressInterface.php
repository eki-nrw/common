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
interface AddressInterface
{
	public function getCountry();
	public function setCountry($country);

	public function getState();
	public function setState($state);

	public function getProvince();
	public function setProvince($province);

	public function getLine1();
	public function setLine1($line1);

	public function getLine2();
	public function setLine2($line2);

	public function getPostCode();
	public function setPostCode($postCode);
}
