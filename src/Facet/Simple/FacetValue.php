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

use Eki\NRW\Common\Common\Facet\FacetInterface;
use Eki\NRW\Common\Common\Facet\FacetValueInterface;

/**
 * Facet Value interface.
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class FacetValue implements FacetValueInterface
{
	protected $identifier;
	private $name;
	private $facet;
	
	public function __construct($name)
	{
		$this->setFacetValueName($name);
		
		$this->identifier = implode("_", explode(" ", str_replace("  ", " ", strtolower($name)));
	}
	
	/**
	* @inheritdoc
	*/
	public function getFacetIdentifier()
	{
		return $this->identifier;
	}

	/**
	* @inheritdoc
	*/
	public function getFacetValueName()
	{
		return $this->name;
	}

	/**
	* @inheritdoc
	*/
	public function setFacetValueName($name)
	{
		$this->name = $name;
	}
	
	/**
	* @inheritdoc
	*/
	public function __toString()
	{
		if (null === $this->getFacet())
			throw new \UnexpectedValueException("Facet Value has no Facet.");
			
		return $this->getFacet()->getFacetName() . "//" . $this->getFacetValueName();
	}
	
	/**
	* @inheritdoc
	*/
	public function getFacet()
	{
		return $this->facet;
	}

	/**
	* @inheritdoc
	*/
	public function setFacet(FacetInterface $facet)
	{
		if (!$facet instanceof SimpleFacet)
			throw new \UnexpectedValueException("Simple facet value only belongs to simple facet.");
		
		$this->facet = $facet;
	}
}
