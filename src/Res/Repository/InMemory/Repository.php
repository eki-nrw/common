<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Repository\InMemory;

use Eki\NRW\Common\Res\Repository\RepositoryInterface;
use Eki\NRW\Common\Testing\Repository\InMemoryRepository;

//use Eki\NRW\Common\Res\Repository\Exception\UnexpectedTypeException;
//use Eki\NRW\Common\Res\Repository\Exception\UnsupportedMethodException;
use Eki\NRW\Common\Res\Model\ResInterface;
//use Eki\NRW\Common\Res\Repository\Exception\ExistingResourceException;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class Repository extends InMemoryRepository implements RepositoryInterface
{
    /**
     * @param string $interface | Fully qualified name of the interface.
     *
     * @throws \InvalidArgumentException
     * @throws UnexpectedTypeException
     */
    public function __construct($interface = ResInterface::class)
    {
        if (null === $interface) {
            throw new \InvalidArgumentException('Resource\'s interface needs to be stated.');
        }

        if (!in_array(ResInterface::class, class_implements($interface))) {
            throw new UnexpectedTypeException($interface, ResInterface::class);
        }

		parent::__construct($interface);
    }

    /**
     * {@inheritdoc}
     *
     * @throws ExistingResourceException
     * @throws UnexpectedTypeException
     */
    public function addResource(ResInterface $resource)
    {
    	parent::add($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function removeResource(ResInterface $resource)
    {
    	parent::remove($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function updateResource(ResInterface $resource)
    {
    	parent::update($res);
    }

    /**
     * {@inheritdoc}
     */
    public function createPaginator(array $criteria = [], array $sorting = [])
    {
        $resources = $this->findAll();

        if (!empty($sorting)) {
            $resources = $this->applyOrder($resources, $sorting);
        }

        if (!empty($criteria)) {
            $resources = $this->applyCriteria($resources, $criteria);
        }

        $adapter = new ArrayAdapter($resources);
        $pagerfanta = new Pagerfanta($adapter);

        return $pagerfanta;
    }
}
