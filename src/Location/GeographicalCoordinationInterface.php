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
interface GeographicalCoordinationInterface extends 
	CoordinationInterface,
	GCInterface
{
	const GEOGRAPHIC_LONGITUDE_KEY = "long";
	const GEOGRAPHIC_LATITUDE_KEY = "lat";
}
