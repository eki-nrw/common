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
 * Simple Facet implementation
 * 
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class Facet implements FacetInterface
{
	protected $identifier;
	private $name;
	private $facetValues = [];
	
	public function __construct($name, array $valueNames = [])
	{
		$this->setFacetName($name);
		$this->identifier = implode("_", explode(" ", str_replace("  ", " ", strtolower($name)));
		$this->setFacetValues($valueNames);		
	}
	
	/**
	* @inheritdoc
	*/
	public function getFacetName()
	{
		return $this->name;
	}

	/**
	* @inheritdoc
	*/
	public function setFacetName($name)
	{
		$this->name = $name;
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
	public function addFacetValue(FacetValueInterface $facetValue)
	{
		if ($this->hasFacetValue($facetValue->getFacetValueIdentifier()))
			throw new \InvalidArgumentException(sprintf("Facet value %s already exists.", $facetValue->getFacetValueIdentifier()));
		if (null !== $facetValue->getFacet())
			throw new \InvalidArgumentException(sprintf(
				"Facet value %s belongs to another facet %s.", 
				$facetValue->getFacetValueIdentifier(),
				$facetValue->getFacet()->getFacetIdentifier()
			));

		$this->facetValues[$facetValue->getFacetValueIdentifier()] = $facetValue;
	}

	/**
	* @inheritdoc
	*/
	public function hasFacetValue($facetValueIdentifier)
	{
		return isset($this->facetValues[$facetValueIdentifier]);
	}

	/**
	* @inheritdoc
	*/
	public function removeFacetValue($facetValueIdentifier)
	{
		throw new \Exception("SimpleFacet don't support removeFacetValue method.")
	}
	
	/**
	* @inheritdoc
	*/
	public function getFacetValues()
	{
		return $this->facetValues;		
	}

	/**
	* @inheritdoc
	*/
	public function setFacetValues(array $facetValues)
	{
		foreach($facetValues as $facetValue)
		{
			if (is_string($facetValue))
			{
				$facetValue = new SimpleFacetValue($facetValue);
			}

			if (!$facetValue instanceof SimpleFacetValue)
				throw new \InvalidArgumentException(sprintf(
					"Facet Value must be string or object (instance of %s). Given %s.",
					SimpleFacetValue::class,
					is_object($facetValue) ? get_class($facetValue) : gettype($facetValue)
				));
				
			$this->addFacetValue($facetValue);
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function __toString()
	{
		$str = 
			$this->getFacetName() .
			"::" .
			"["
		;
		
		foreach($this->facetValues as $identifier => $facetValue)
		{
			$str .= $facetValue->getFacetValueName() . ", ";
		}
		
		$str .= "]";
		
		return $str;	
			
		;		
	}
}
