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
trait StartEndTimeTrait
{
	private $startDate;
	private $endDate;
	
	/**
	* @inheritdoc
	*/
	public function getStartDate()
	{
		return $this->startDate;
	}

	/**
	* @inheritdoc
	*/
	public function setStartDate(DateTime $start = null)
	{
		$this->validateStartEndTime($start, $this->getEndDate());

		$this->startDate = $start;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/
	public function getEndDate()
	{
		return $this->endDate;
	}

	/**
	* @inheritdoc
	*/
	public function setEndDate(DateTime $end = null)
	{
		$this->validateStartEndTime($this->getStartDate(), $end);

		$this->endDate = $end;
		
		return $this;
	}

	/**
	* Validate start/end time
	* 
	* @throws \InvalidArgumentException
	*/
	protected function validateStartEndTime($start, $end)
	{
		if ($start === null or $end === null)
			return;
			
		if (!$start instanceof DateTime)
			throw new \InvalidArgumentException("start parameter muse be instance of DateTime");

		if (!$end instanceof DateTime)
			throw new \InvalidArgumentException("end parameter muse be instance of DateTime");
			
		if ($start->getTimestamp() > $end->getTimestamp())
			throw new \InvalidArgumentException('Setting start/end datetime invalid.');
	}
}
