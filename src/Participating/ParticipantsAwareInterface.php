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

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ParticipantsAwareInterface
{
	/**
	* Add participant
	* 
	* @param ParticipantInterface $participant
	* 
	* @return void
	*/
	public function addParticipant(ParticipantInterface $participant);
	
	/**
	* Gets a participant of role
	* 
	* @param string $role
	* 
	* @return ParticipantInterface
	*/
	public function getParticipant($role);

	/**
	* Checks if there is a participant that has the given role
	* 
	* @param string $role
	* 
	* @return bool
	*/
	public function hasParticipant($role);

	/**
	* Remove the given participant
	* 
	* @param ParticipantInterface $participant
	* 
	* @return void
	* 
	* @throws 
	*/
	public function removeParticipant(ParticipantInterface $participant);

	/**
	* Remove participant by role
	* 
	* @param string $role
	* 
	* @return void
	* 
	* @throws 
	*/
	public function removeParticipantByRole($role);

	/**
	* Gets all participants
	* 
	* @return ParticipantInterface[]
	*/
	public function getParticipants();
	
	/**
	* Sets all participants
	* 
	* @param ParticipantInterface[] $participants
	* 
	* @return void
	*/
	public function setParticipants(array $participants);
}
