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
class Coordination extends AbstractCoordination
{
	public function __construct($type, array $coordinates = [], CoordinateValidatorInterface $validator = null)
	{
		$this->validator = $validator;
		
		parent::__construct($type, $coordinates);
	}
}
