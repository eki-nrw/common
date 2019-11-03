<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Participating;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait HasPartnerTrait
{
	/**
	* @var PartnerInterface
	*/
	private $partner;
	
	/**
	* @inheritdoc
	*/
	public function getPartner()
	{
		return $this->partner;		
	}
	
	/**
	* @inheritdoc
	*/
	public function setPartner(PartnerInterface $partner = null)
	{
		$this->partner = $partner;
	}
}
