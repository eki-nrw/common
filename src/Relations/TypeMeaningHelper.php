<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class TypeMeaningHelper
{
	const DEF_DOMAIN = "dom";    //place holder, never use in reality
	
	use
		TypeMeaningTrait
	;

	public function __construct()
	{
		$this->reset();
	}
	
	/**
	* @var string
	*/	
	private $type = "";

	public function setType($type)
	{
		if (!is_string($type))
			throw new \InvalidArgumentException(sprintf("Parameter 'type' must be string. Given %s.", gettype($type)));

		$this->type = $type;
		
		return $this;
	}

	public function getType()
	{
		return $this->type;
	}
	
	public function setDomainType($domainType)
	{
		if (!is_string($domainType))
			throw new \InvalidArgumentException("Parameter 'domainType' must be string.");
		
		$typeChain = $this->getTypeChain();
		$typeChain[TypeMeaningInterface::INDEX_DOMAIN] = $domainType;

		$this->reComposeTypes($typeChain);
		
		return $this;
	}

	public function setCategorizationType($catType)
	{
		if (!is_string($catType))
			throw new \InvalidArgumentException("Parameter 'catType' must be string.");
		
		$typeChain = $this->getTypeChain();
		$typeChain[TypeMeaningInterface::INDEX_CATEGORIZATION_TYPE] = $catType;

		$this->reComposeTypes($typeChain);
		
		return $this;
	}

	public function setMainType($mainType)
	{
		if (!is_string($mainType))
			throw new \InvalidArgumentException("Parameter 'mainType' must be string.");
		
		$typeChain = $this->getTypeChain();
		$typeChain[TypeMeaningInterface::INDEX_MAIN_TYPE] = $mainType;

		$this->reComposeTypes($typeChain);
		
		return $this;
	}

	public function setSubType($subType)
	{
		if (!is_string($subType))
			throw new \InvalidArgumentException("Parameter 'subType' must be string.");
		
		$typeChain = $this->getTypeChain();
		$typeChain[TypeMeaningInterface::INDEX_SUB_TYPE] = $subType;

		$this->reComposeTypes($typeChain);
		
		return $this;
	}
	
	public function getRestType($fromIndex)
	{
		if ($fromIndex < TypeMeaningInterface::INDEX_MIN or $fromIndex > TypeMeaningInterface::INDEX_MAX)
			throw new \OutOfRangeException(sprintf(
				"Parameter 'fromIndex' must be in [%s, $s]. Given %s.",
				TypeMeaningInterface::INDEX_MIN,
				TypeMeaningInterface::INDEX_MAX,
				$fromIndex
			));
			
		$typeChain = $this->getTypeChain();
		$count = count($typeChain);
		
		if ($count === 0)
			throw new \LogicException("Type chain is empty.");
		
		$type = "";
		for($i=$fromIndex;$i<$count;$i++)
		{
			$type = $typeChain[$i] . ($i < $count - 1) ? TypeMeaningInterface::RELATION_TYPE_CHAIN_DELIMETER : "";
		}
		
		return $type;
	}
	
	public function setRestType($restType, $fromIndex)
	{
		if (!is_string($restType))
			throw new \InvalidArgumentException("Parameter 'resType' must be string.");
		if (!is_int($fromIndex))
			throw new \InvalidArgumentException("Parameter 'fromIndex' must be integer.");
		if ($fromIndex < TypeMeaningInterface::INDEX_DOMAIN or $fromIndex > TypeMeaningInterface::INDEX_SUB_TYPE)
			throw new \InvalidArgumentException(sprintf(
				"Parameter 'fromIndex' must be in [%s, %s].",
				TypeMeaningInterface::INDEX_DOMAIN, TypeMeaningInterface::INDEX_SUB_TYPE
			));
		
		$typeChain = $this->getTypeChain();
		$type = "";
		for($i=TypeMeaningInterface::INDEX_DOMAIN;$i<$fromIndex;$i++)
		{
			$type = $typeChain[$i] . TypeMeaningInterface::RELATION_TYPE_CHAIN_DELIMETER;
		}
		$type = $type . $resType;
		
		$typeChain = $this->getTypeChain($type);

		$this->reComposeTypes($typeChain);
		
		return $this;
	}

	private function reComposeTypes(array $typeChain)
	{
		$this->type = self::composeTypes(
			isset($typeChain[TypeMeaningInterface::INDEX_DOMAIN]) ? 
				$typeChain[TypeMeaningInterface::INDEX_DOMAIN]    : 
				""
			,
			isset($typeChain[TypeMeaningInterface::INDEX_CATEGORIZATION_TYPE]) ? 
				$typeChain[TypeMeaningInterface::INDEX_CATEGORIZATION_TYPE]    : 
				""
			,
			isset($typeChain[TypeMeaningInterface::INDEX_MAIN_TYPE]) ? 
				$typeChain[TypeMeaningInterface::INDEX_MAIN_TYPE]    : 
				""
				,
			isset($typeChain[TypeMeaningInterface::INDEX_SUB_TYPE]) ? 
				$typeChain[TypeMeaningInterface::INDEX_SUB_TYPE]    : 
			null
		);
	}
	
	public function reset()
	{
		$this->setDomainType(self::DEF_DOMAIN);
	}
}
