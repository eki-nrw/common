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
interface PartnersAwareInterface
{
	public function addPartner(PartnerInterface $partner);
	public function removePartner(PartnerInterface $partner);
	public function getPartner($index);
	public function hasPartner($index);
	public function removePartnerByIndex($index);
	public function getPartners();
	public function setPartners(array $partners);
}
