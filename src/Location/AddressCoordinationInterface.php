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
interface AddressCoordinationInterface extends 
	CoordinationInterface,
	AddressInterface
{
	const ADDRESS_COUNTRY_KEY = "country";
	const ADDRESS_STATE_KEY = "state";
	const ADDRESS_PROVINCE_KEY = "province";
	const ADDRESS_LINE_1_KEY = "line_1";
	const ADDRESS_LINE_2_KEY = "line_2";
	const ADDRESS_POST_CODE_KEY = "post_code";
}
