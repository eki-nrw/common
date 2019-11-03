<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Tests\Manager;

use Eki\NRW\Common\Relations\RelationInterface;
use Eki\NRW\Common\Relations\Relation;
use Eki\NRW\Common\Relations\AbstractRelation;
use Eki\NRW\Common\Relations\Relationship\RelationshipInterface;
use Eki\NRW\Common\Relations\Relationship\Relationship;
use Eki\NRW\Common\Relations\Manager\AbstractRelationManager;
use Eki\NRW\Common\Relations\RelationManagerInterface;
use Eki\NRW\Common\Res\Factory\FactoryInterface;
use Eki\NRW\Common\Res\Factory\Factory;
use Eki\NRW\Common\Res\Repository\RepositoryInterface;
use Eki\NRW\Common\Res\Repository\InMemory\Repository as InMemoryRepository;

use Eki\NRW\Common\Relations\Tests\Fixtures\RelationInterface as FixtureRelationInterface;
use Eki\NRW\Common\Relations\Tests\Fixtures\RelationAA;
use Eki\NRW\Common\Relations\Tests\Fixtures\RelationBB;

use PHPUnit\Framework\TestCase;

use stdClass;

class AbstractRelationManagerTest extends TestCase
{
	private $factory;
	private $repository;
	private $manager;
	
	public function setUp()
	{
		$this->factory = $this->createFactory();
		$this->repository = $this->createRepository();
		$this->manager = $this->createManager($this->factory, $this->repository);
	}
	
	public function tearDown()
	{
		$this->repository = null;
		$this->factory = null;
		$this->manager = null;
	}

    public function testCreate()
    {
    	$manager = $this->manager;
    	
    	$relation = $manager->create('aa');

		$this->assertNotNull($relation);    	
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreate_Wrong()
    {
    	$manager = $this->manager;
    	
    	$relation = $manager->create('zz');
    }

    public function testLink()
    {
    	$manager = $this->manager;
    	
    	$relation = $manager->create('bb');
    	
    	$retRelation = $manager->link($relation, new stdClass(), array('default' => new stdClass()));
    	
    	$this->assertEquals($relation, $retRelation);
    }

    public function testFind()
    {
    	$manager = $this->manager;
    	
    	$relation_aa = $manager->create('aa');
    	$relation_aa->setName('aaaaaaaaaa');
    	
    	$relation_bb = $manager->create('bb');
    	$relation_bb->setName('bbbbbbbbbb');

    	$relation_xx = $manager->create('aa');
    	$relation_xx->setName('aaaaaaaaaa');

    	$relation_yy = $manager->create('bb');
    	$relation_yy->setName('bbbbbbbbbb');

		$results = $manager->find(['name' => 'bbbbbbbbbb']);
		
		print "Find:\n";
		print "Number of results=" . count($results) . "\n";
		foreach($results as $result)
		{
			print $result->getName() . "\n";
		}
    }

    public function testFindWithRelationType()
    {
    	$manager = $this->manager;
    	
    	$relation_aa = $manager->create('aa');
    	$relation_aa->setName('aaaaaaaaaa');
    	
    	$relation_bb = $manager->create('bb');
    	$relation_bb->setName('xxxx');

    	$relation_xx = $manager->create('aa');
    	$relation_xx->setName('aaaaaaaaaa');

    	$relation_yy = $manager->create('bb');
    	$relation_yy->setName('yyyy');

		$results = $manager->find([], 'BB');
		
		print "Find with relation type:\n";
		print "Number of results=" . count($results) . "\n";
		foreach($results as $result)
		{
			print $result->getName() . "\n";
		}
    }


    public function testFindOne()
    {
    	$manager = $this->createManager($this->factory, $this->repository);
    	
    	$relation_aa = $manager->create('aa');
    	$relation_aa->setName('xx');
    	
    	$relation_bb = $manager->create('bb');
    	$relation_bb->setName('bb');

    	$relation_xx = $manager->create('aa');
    	$relation_xx->setName('yy');

    	$relation_yy = $manager->create('bb');
    	$relation_yy->setName('bb');

		$result = $manager->findOne(['name' => 'bb']);
//		$result = $manager->findOne();
		
		print "Find One:\n";
		print $result->getName() . "\n";
    }
    
    private function createFactory()
    {
		$factory = new Factory(array(
			'aa' => RelationAA::class,
			'bb' => RelationBB::class, 
		));
		
		return $factory;
	}
	
	private function createRepository()
	{
		return new InMemoryRepository('\Eki\NRW\Common\Relations\Tests\Fixtures\RelationInterface');
	}
	
	private function createManager(FactoryInterface $factory, RepositoryInterface $repository)
	{
		$manager = $this->getMockBuilder(AbstractRelationManager::class)
             ->setConstructorArgs(array($factory, $repository))
             ->getMockForAbstractClass()
    	;
    	
    	return $manager;
	}
}
