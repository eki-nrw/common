<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Testing\Repository;

use Eki\NRW\Common\Testing\Repository\Exception\UnexpectedTypeException;
use Eki\NRW\Common\Testing\Repository\Exception\UnsupportedMethodException;
use Eki\NRW\Common\Testing\Repository\Exception\ExistingResourceException;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

use ArrayObject;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class InMemoryRepository implements RepositoryInterface
{
    /**
     * @var PropertyAccessor
     */
    protected $accessor;

    /**
     * @var ArrayObject
     */
    protected $arrayObject;

    /**
     * @var string
     */
    protected $interface;

    /**
     * @param string $interface | Fully qualified name of the interface.
     *
     * @throws \InvalidArgumentException
     * @throws UnexpectedTypeException
     */
    public function __construct($interface)
    {
        if (null === $interface) {
            throw new \InvalidArgumentException('Resource\'s interface needs to be stated.');
        }

        $this->interface = $interface;
        $this->accessor = PropertyAccess::createPropertyAccessor();
        $this->arrayObject = new ArrayObject();
    }

    /**
     * {@inheritdoc}
     *
     * @throws ExistingResourceException
     * @throws UnexpectedTypeException
     */
    public function add($resource)
    {
        if (!$resource instanceof $this->interface) {
            throw new UnexpectedTypeException($resource, $this->interface);
        }

        if (in_array($resource, $this->findAll())) {
            throw new ExistingResourceException();
        }

        $this->arrayObject->append($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($resource)
    {
        $newResources = array_filter($this->findAll(), function ($object) use ($resource) {
            return $object !== $resource;
        });

        $this->arrayObject->exchangeArray($newResources);
    }

    /**
     * {@inheritdoc}
     */
    public function update($resource)
    {
    	// nothing to do
    }

    /**
     * {@inheritdoc}
     *
     */
    public function find($id)
    {
    	return $this->findOneBy(array('id'=>$id));
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->arrayObject->getArrayCopy();
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $results = $this->findAll();

        if (!empty($criteria)) {
            $results = $this->applyCriteria($results, $criteria);
        }

        if (!empty($orderBy)) {
            $results = $this->applyOrder($results, $orderBy);
        }

        $results = array_slice($results, $offset, $limit);

        return $results;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     */
    public function findOneBy(array $criteria)
    {
        if (empty($criteria)) {
            throw new \InvalidArgumentException('The criteria array needs to be set.');
        }

        $results = $this->applyCriteria($this->findAll(), $criteria);

        if ($result = reset($results)) {
            return $result;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getClassName()
    {
        return $this->interface;
    }

    /**
     * @param mixed[] $resources
     * @param array   $criteria
     *
     * @return array
     */
    protected function applyCriteria(array $resources, array $criteria)
    {
        foreach ($this->arrayObject as $object) {
            foreach ($criteria as $criterion => $value) {
                if ($value !== $this->accessor->getValue($object, $criterion)) {
                    $key = array_search($object, $resources);
                    unset($resources[$key]);
                }
            }
        }

        return $resources;
    }

    /**
     * @param mixed[] $resources
     * @param array $orderBy
     *
     * @return mixed[]
     */
    protected function applyOrder(array $resources, array $orderBy)
    {
        $results = $resources;

        foreach ($orderBy as $property => $order) {
            $sortable = [];

            foreach ($results as $key => $object) {
                $sortable[$key] = $this->accessor->getValue($object, $property);
            }

            if (RepositoryInterface::ORDER_ASCENDING === $order) {
                asort($sortable);
            }
            if (RepositoryInterface::ORDER_DESCENDING === $order) {
                arsort($sortable);
            }

            $results = [];

            foreach ($sortable as $key => $propertyValue) {
                $results[$key] = $resources[$key];
            }
        }

        return $results;
    }
}
