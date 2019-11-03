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
 * Facet Value interface.
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
interface FacetValueInterface
{
	public function getFacetValueName();
	public function setFacetValueName($name);
	public function getFacetValueIdentifier();
	
	public function getFacet();
	public function setFacet(FacetInterface $facet);

	public function __toString();
}
