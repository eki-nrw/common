<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Participating;

use Eki\NRW\Common\Common\HasAttributesTrait;
use Eki\NRW\Common\Common\HasPropertiesTrait;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Partner implements PartnerInterface
{
	use
		HasAttributesTrait,
		HasPropertiesTrait
	;

	private $index;
	private $actor;
	
	public function __construct($index, $name = null, $actor = null)
	{
		$this->setIndex($index);
		$this->setName($name);
		$this->setActor($actor);		
	}
	
	/**
	* @inheritdoc
	*/
	public function getIndex()
	{
		return $this->index;
	}
	
	/**
	* @inheritdoc
	*/
	public function setIndex($index)
	{
		$this->index = $index;
	}
	
	/**
	* @inheritdoc
	*/
	public function getName()
	{
		return $this->getAttribute('name');
	}
	
	/**
	* @inheritdoc
	*/
	public function setName($name)
	{
		$this->setAttribute('name', $name);
	}
	
	/**
	* @inheritdoc
	*/
	public function getActor()
	{
		return $this->actor;
	}
	
	/**
	* @inheritdoc
	*/
	public function setActor($actor)
	{
		$this->actor = $actor;
	}
}
