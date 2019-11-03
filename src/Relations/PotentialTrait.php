<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* PotentialTrait must be inserted after HasParametersTrait
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait PotentialTrait
{
	/**
	* @inheritdoc
	*/	
	public function setActive($active = true)
	{
		if ($active !== true and $active !== false)
			throw new \InvalidArgumentException("Set active must be true or false. Given $active.");
		
		$this->setParameter('potentialActive', $active);
	}
	
	/**
	* @inheritdoc
	*/	
	public function isActive()
	{
		return $this->getParameter('potentialActive', false);
	}
	
	/**
	* @inheritdoc
	*/	
	public function setPotential($potentialLevel)
	{
		if (!is_int($potentialLevel))
			throw new \InvalidArgumentException(sprintf(
				"Potential level must be integer. Given %s.", gettype($potentialLevel)
		));

		$minPotential = $this->getParameter(
			'minPotential', 
			PotentialInterface::POTENTIAL_DEFAULT_MIN
		);
		if ($potentialLevel < $minPotential)
			throw new \OutOfRangeException("Potential $potentialLevel is less than minimum potential $minPotential");
			
		$maxPotential = $this->getParameter(
			'maxPotential', 
			PotentialInterface::POTENTIAL_DEFAULT_MAX
		);
		if ($potentialLevel > $maxPotential)
			throw new \OutOfRangeException("Potential $potentialLevel is greater than maximum potential $maxPotential");
		
		$this->setParameter('potential', $potentialLevel);
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function getPotential()
	{
		return $this->getParameter('potential', PotentialInterface::POTENTIAL_DEFAULT_FIRST);
	}

	/**
	* Set threshold
	* 
	* @param int $min
	* @param int $max
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	protected function setPotentialThresholds($min, $max)
	{
		if (!is_int($min) or !is_int($max))
			throw new \InvalidArgumentException(
				sprintf("min and max parameters must be int type. Given %s for min and %s for max.", get_type($min), get_type($max))
			);
			
		if ($min >= $max)
			throw new \InvalidArgumentException(sprintf("min and max potentials are invalid."));		
			
		$this->setParameter('minPotential', $min);
		$this->setParameter('maxPotential', $max);
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function isPotentialMin()
	{
		return $this->getPotential() === $this->getParameter('minPotential', PotentialInterface::POTENTIAL_DEFAULT_MIN);
	}

	public function isPotentialMax()
	{
		return $this->getPotential() === $this->getParameter('maxPotential', PotentialInterface::POTENTIAL_DEFAULT_MAX);
	}
}
