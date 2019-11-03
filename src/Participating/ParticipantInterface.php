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

use Eki\NRW\Common\Common\HasAttributesInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ParticipantInterface extends
	HasPartnerInterface,
	HasAttributesInterface
{
	/**
	* Returns name of participant
	* 
	* @return string
	*/
	public function getName();
	
	/**
	* Sets the name of participant
	* 
	* @param string $name
	* 
	* @return void
	*/
	public function setName($name);
	
	/**
	* Returns the role of the participant
	* 
	* @return string
	*/
	public function getRole();
	
	/**
	* Sets the role of the participant
	* 
	* @param string $role
	* 
	* @return void
	*/
	public function setRole($role);
}
