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
trait PartnersAwareTrait
{
	/**
	* @var PartnerInterface[]
	*/
	private $partners = [];
	
	/**
	* @inheritdoc
	*/
	public function addPartner(PartnerInterface $partner)
	{
		if (isset($this->partners[$index]))
		{
			throw new \InvalidArgumentException(sprintf(
				"Already partner has the same index '%s' of the given partner", 
				$partner->getIndex()
			));
		}

		$this->partners[$partner->getIndex()] = $partner;		
	}
	
	/**
	* @inheritdoc
	*/
	public function getPartner($index)
	{
		if(isset($this->partners[$index]))
			return $this->partners[$index];
	}

	/**
	* @inheritdoc
	*/
	public function hasPartner($index)
	{
		return isset($this->partners[$index]);

 	/**
	* @inheritdoc
	*/
	public function getPartners()
	{
		return $this->partners;
	}

	/**
	* @inheritdoc
	*/
 	public function setPartners(array $partners)
 	{
		$this->partners = [];
		foreach($partners as $index => $partner)
		{
			$this->setPartner($index, $partner);
		}
	}
}
