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

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Participant implements ParticipantInterface
{
	use
		HasPartnerTrait,
		HasAttributesTrait
	;
	
	/**
	* @var string
	*/
	private $role;
	
	/**
	* Constructor
	* 
	* @param string $role
	* @param string $name
	* @param PartnerInterface $partner
	* @param array $attributes
	*/
	public function __construct($role, $name = null, PartnerInterface $partner = null, array $attributes = [])
	{
		$this->setAttributes($attributes);
		$this->setRole($role);
		$this->setName($name);
		$this->setPartner($partner);
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
	public function getRole()
	{
		return $this->role;
	}
	
	/**
	* @inheritdoc
	*/
	public function setRole($role)
	{
		$this->role = $role;
	}
}
