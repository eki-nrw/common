<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Manager;

use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\Node;
use Eki\NRW\Common\Relations\AbstractRelation;
use Eki\NRW\Common\Res\Model\ResInterface;
use Eki\NRW\Common\Res\Factory\FactoryInterface;
use Eki\NRW\Common\Res\Repository\RepositoryInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractRelationManager implements RelationManagerInterface
{
	/**
	* @var FactoryInterface
	*/
	protected $factory;

	/**
	* 
	* @var RepositoryInterface
	* 
	*/	
	protected $repository;
	
	/**
	* Constructor
	* 
	* @param FactoryInterface $factory
	* @param RepositoryInterface $repository
	* 
	*/
	public function __construct(FactoryInterface $factory, RepositoryInterface $repository = null)
	{
		$this->factory = $factory;
		$this->repository = $repository;	
	}
	
	/**
	* @inheritdoc
	*/
	public function create($type)
	{
		$relation = $this->factory->createNew($type, array($type));
		
		if (null !== $this->repository and $relation instanceof ResInterface)
		{
			$this->repository->add($relation);
		}
		
		return $relation;
	}
	
	/**
	* @inheritdoc
	*/
	public function link(RelationInterface $relation, $base, array $others)
	{
		if ($base instanceof NodeInterface)
		{
			$relation->setBase($base);
		}
		else if (is_object($base))
		{
			$node = new Node($this->nodeNameFromObject($base), $base);
			
			$relation->setBase($node);	
		}
		else
		{
			throw new \InvalidArgumentException("base parameter must be instance of NodeInterface or object.");
		}
		
		$_others = array();
		foreach($others as $key => $other)
		{
			if ($other instanceof NodeInterface)
				$_others[$key] = $other;
			else if (is_object($other))
			{
				$_others[$key] = new Node($key, $other);
			}
			else
			{
				throw new \InvalidArgumentException("other parameter with key $key must be instance of NodeInterface or object.");
			}	
		}
		$relation->setOthers($_others);
		
		return $relation;
	}
	
	protected function nodeNameFromObject($obj)
	{
		$nodeName = '';
		if (method_exists($obj, 'getName'))
		{
			$nodeName = $obj->getName();
		}
		else if ($obj instanceof ResInterface)
		{
			$nodeName = $obj->getId();
		}
		
		return $nodeName;
	}
	
	/**
	* @inheritdoc
	*/
	public function unlink(RelationInterface $relation)
	{
		$others = $relation->getOthers();
		foreach($others as $key => $other)
		{
			$relation->removeOtherHasKey($key);
		}

		$relation->setBase(null);
	}
	
	/**
	* @inheritdoc
	*/
	public function find(array $filters = [], $relationType = null)
	{
		if (null === $this->repository)
			return null;
		
		if ($relationType !== null)
		{
			$filters['relation_type'] = $relationType;
		}

		return $this->repository->findBy($this->convertFindFilter($filters));
	}

	/**
	* @inheritdoc
	*/
	public function findOne(array $filters = [], $relationType = null)
	{
		if (null === $this->repository)
			return null;

		if ($relationType !== null)
		{
			$filters['relation_type'] = $relationType;
		}

		return $this->repository->findOneBy($this->convertFindFilter($filters));
	}
	
	protected function convertFindFilter(array $filters)
	{
		return $filters;
	}
}
