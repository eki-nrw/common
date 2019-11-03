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
trait ParticipantsAwareTrait
{
	/**
	* @var array
	*/
	private $participants = array();
	
	/**
	* @inheritdoc
	*/
	public function addParticipant(ParticipantInterface $participant)
	{
		if (isset($this->participants[$participant->getRole()]))
			throw new \InvalidArgumentException(sprintf("Participant role %s is already exists.", $participant->getRole()));
			
		$this->participants[$participant->getRole()] = $participant;
	}

	/**
	* @inheritdoc
	*/
	public function removeParticipant(ParticipantInterface $participant)
	{
		foreach($this->participants as $role => $traceParticipant)
		{
			if ($participant === $traceParticipant)
			{
				unset($this->participants[$role]);
				return;	
			}
		}
		
		throw new \InvalidArgumentException(sprintf("No participant with role %s to remove.", $participant->getRole()));
	}

	/**
	* @inheritdoc
	*/
	public function removeParticipantByRole($role)
	{
		if (!isset($this->participants[$role]))
			throw new \InvalidArgumentException("No participant with role $role to remove.");
		
		unset($this->participants[$role]);
	}
	
	/**
	* @inheritdoc
	*/
	public function getParticipant($role)
	{
		if (isset($this->participants[$role]))
			return $this->participants[$role];
	}

	/**
	* @inheritdoc
	*/
	public function hasParticipant($role)
	{
		return isset($this->participants[$role]);
	}

	/**
	* @inheritdoc
	*/
	public function getParticipants()
	{
		return $this->participants;
	}

	/**
	* @inheritdoc
	*/
	public function setParticipants(array $participants)
	{
		$this->participants = [];
		foreach($participants as $participant)
		{
			$this->addParticipant($participant);
		}
	}
}
