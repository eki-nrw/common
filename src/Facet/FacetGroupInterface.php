<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Facet;

/**
 * Facet group interface.
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
interface FacetGroupInterface
{
	public function getFacetGroupIdentifier();
	
	public function getFacetGroupName();
	public function setFacetGroupName($groupName);

	public function getFacetGroupPurposes();
	public function setFacetGroupPurposes($purposes);
	
	public function addFacet(FacetInterface $facet);
	public function removeFacet(FacetInterface $facet);
	public function getFacets();
}
