<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Facet\Simple;

use Eki\NRW\Common\Common\Facet\FacetGroupInterface;
use Eki\NRW\Common\Common\Facet\FacetInterface;

/**
 * Simple Facet group implementation.
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class FacetGroup implements FacetGroupInterface
{
	protected $identifier;
	private $name;
	private $purposes;
	private $facets = [];
	
	public function __construct($name, $purposes = array())
	{
		$this->name = $name;
		$this->identifier = implode("_", explode(" ", str_replace("  ", " ", strtolower($name)));
		$this->setPurposes($purposes);
	}
	
	public function getFacetGroupIdentifier()
	{
		return $this->identifier;
	}
	
	public function getFacetGroupName()
	{
		return $this->name;
	}
	
	public function setFacetGroupName($groupName)
	{
		$this->name = $groupName;
	}

	public function getFacetGroupPurposes()
	{
		return $this->purposes;
	}
	
	public function setFacetGroupPurposes($purposes)
	{
		if (is_string($purposes))
			$purposes = array($purposes);
			
		if (!is_array($purpose))
			throw new \InvalidArgumentException("Purposes must be array.");
			
		foreach($purposes as $purpose)
		{
			if (!is_string($purpose))
				throw new \InvalidArgumentException("Purpose must be string.");
				
			$this->purposes[$purpose] = $purpose;
		}
	}
	
	public function addFacet(FacetInterface $facet)
	{
		if (isset($this->facets[$facet->getIdentifier()]))
			throw new \InvalidArgumentException(sprintf("Facet with identifier %s already exists.", $facet->getIdentifier()));
		
		$this->facets[$facet->getFacetIdentifier()] = $facet;		
	}
	
	public function removeFacet(FacetInterface $facet)
	{
		if (!isset($this->facets[$facet->getFacetIdentifier()]))	
			throw new \InvalidArgumentException(sprintf("No facet with identifier %s to remove.", $facet->getIdentifier()));
			
		unset($this->facets[$facet->getFacetIdentifier()]);
	}
	
	public function getFacets()
	{
		return $this->facets;
	}
}
