<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Testing\Tests\Repository;

use Eki\NRW\Common\Testing\Repository\InMemoryRepository;

use PHPUnit\Framework\TestCase;

use \stdClass;

abstract class TestRes
{
	private $name;
	private $prop;
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getProp()
	{
		return $this->prop;	
	}
	
	public function setProp($prop)
	{
		$this->prop = $prop;
	}
}

class Dummy
{
	private $feature;
	
	public function __construct($feature)
	{
		$this->setFeature($feature);
	}
	
	public function getFeature()
	{
		return $this->feature;
	}
	
	public function setFeature($feature)
	{
		$this->feature = $feature;	
	}
}

abstract class TestResComplex
{
	private $dummy;
	
	public function setDummy(Dummy $dummy)
	{
		$this->dummy = $dummy;	
	}
	
	public function getDummy()
	{
		return $this->dummy;
	}
}

class InMemoryRepositoryTest extends TestCase
{
	private $repository;
	private $obj_1;
	private $obj_2;
	private $obj_3;
	private $obj_a;
	private $obj_b;
	
	private $obj_std;
	
	public function setUp()
	{
		$this->repository = new InMemoryRepository(TestRes::class);
		
		$obj_1 = $this->getMockBuilder(TestRes::class)->getMockForAbstractClass();
		$obj_1->setName("One");
		$obj_1->setProp(1);
		$this->repository->add($obj_1);
		
		$obj_2 = $this->getMockBuilder(TestRes::class)->getMockForAbstractClass();
		$obj_2->setName("Two");
		$obj_2->setProp(2);
		$this->repository->add($obj_2);

		$obj_3 = $this->getMockBuilder(TestRes::class)->getMockForAbstractClass();
		$obj_3->setName("Three");
		$obj_3->setProp(3);
		$this->repository->add($obj_3);

		$obj_a = $this->getMockBuilder(TestRes::class)->getMockForAbstractClass();
		$obj_a->setName("A");
		$obj_a->setProp('a');
		$this->repository->add($obj_a);

		$obj_b = $this->getMockBuilder(TestRes::class)->getMockForAbstractClass();
		$obj_b->setName("B");
		$obj_b->setProp('b');
		$this->repository->add($obj_b);
	}
	
	public function tearDown()
	{
		$this->repository = null;
	}
	
	public function testFind()
	{
		$repository = new InMemoryRepository(InternalRes::class);
		$obj = new InternalRes(99);
		$repository->add($obj);
		$foundObj = $repository->find(99);
		$this->assertSame($obj, $foundObj);
	}

	public function testFindBySimple()
	{
		$repository = $this->repository;
		
		$obj = $repository->findOneBy(array('prop' => 2));
		$this->assertNotNull($obj);
		$this->assertSame('Two', $obj->getName());		

		$obj = $repository->findOneBy(array('name' => 'Three'));
		$this->assertNotNull($obj);
		$this->assertEquals(3, $obj->getProp());		

		$obj = $repository->findOneBy(array('name' => 'ThreeX'));
		$this->assertNull($obj);
	}

	public function testFindByMore()
	{
		$repository = $this->repository;
		
		$obj = $repository->findOneBy(array('prop' => 2, 'name' => 'Two'));
		$this->assertNotNull($obj);

		$obj = $repository->findOneBy(array('name' => 'Three', 'prop' => 100));
		$this->assertNull($obj);
	}

	public function testFindByComplex()
	{
		$repository = new InMemoryRepository(TestResComplex::class);	
		
		$complex = $this->getMockBuilder(TestResComplex::class)->getMockForAbstractClass();
		$dummy = new Dummy('A feature');
		$complex->setDummy($dummy);
		$repository->add($complex);
		
		$obj = $repository->findOneBy(array('dummy.feature' => 'A feature'));
		$this->assertNotNull($obj);
	}
}

class InternalRes
{
	private $internalId;
	
	public function __construct($internalId)
	{
		$this->internalId = $internalId;	
	}
	
	public function getId()
	{
		return $this->internalId;
	}
}
