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
 * Facet interface.
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
interface FacetInterface
{
	// Facet
	public function getFacetName();
	public function setFacetName($name);
	public function getFacetIdentifier();

	// Facet values	
	public function addFacetValue(FacetValueInterface $facetValue);
	public function removeFacetValue($facetValueIdentifier);
	public function hasFacetValue($facetValueIdentifier);
	public function getFacetValues();
	public function setFacetValues(array $facetValues);

	// Humanize/readable	
	public function __toString();
}
