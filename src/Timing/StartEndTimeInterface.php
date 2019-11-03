<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Timing;

use DateTime;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface StartEndTimeInterface
{
	public function getStartDate();
	public function setStartDate(DateTime $start = null);
	public function getEndDate();
	public function setEndDate(DateTime $end = null);
}
