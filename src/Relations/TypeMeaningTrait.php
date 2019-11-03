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
trait TypeMeaningTrait
{
	/**
	* @inheritdoc
	*/
	public function getTypeChain($type = null)
	{
		if (null !== $type and !is_string($type))
			throw new \InvalidArgumentException("Parameter 'type' must be string.");
		
		if ($type === null)
			$type = $this->getType();
		
		return explode(TypeMeaningInterface::RELATION_TYPE_CHAIN_DELIMETER, $type);
	}
	
	/**
	* @inheritdoc
	*/
	public function getRelationDomain()
	{
		$types = $this->getTypeChain();
		if (isset($types[TypeMeaningInterface::INDEX_DOMAIN]))
			return $types[TypeMeaningInterface::INDEX_DOMAIN];
	}

	/**
	* @inheritdoc
	*/
	public function getCategorizationType()
	{
		$types = $this->getTypeChain();
		if (isset($types[TypeMeaningInterface::INDEX_CATEGORIZATION_TYPE]))
			return $types[TypeMeaningInterface::INDEX_CATEGORIZATION_TYPE];
	}

	/**
	* @inheritdoc
	*/
	public function getMainType()
	{
		$types = $this->getTypeChain();
		if (isset($types[TypeMeaningInterface::INDEX_MAIN_TYPE]))
			return $types[TypeMeaningInterface::INDEX_MAIN_TYPE];
	}

	/**
	* @inheritdoc
	*/
	public function getSubType()
	{
		$types = $this->getTypeChain();
		if (isset($types[TypeMeaningInterface::INDEX_SUB_TYPE]))
			return $types[TypeMeaningInterface::INDEX_SUB_TYPE];
	}

	/**
	* @inheritdoc
	*/
	static public function composeTypes($domain, $categorization, $main, $sub = null)
	{
		$types = array();
		
		$i = TypeMeaningInterface::INDEX_MIN;
		foreach(
			array('domain' => $domain, 'categorization' => $categorization, 'main' => $main, 'sub' => $sub)
			as
			$title => $type
		)
		{
			if (empty($type))
				break;
				
			$types[$i] = $type;
			$i++;
		}
		
		return implode(TypeMeaningInterface::RELATION_TYPE_CHAIN_DELIMETER, $types);
	}
}
