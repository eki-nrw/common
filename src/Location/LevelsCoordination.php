<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Location;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class LevelsCoordination extends Coordination implements LevelsCoordinationInterface
{
	public function __construct($levelCoordinates, $numLevels = null)
	{
		if (!is_array($levelCoordinates) and !is_string($levelCoordinates))
			throw new \InvalidArgumentException("'levelCoordinates' parameter must be array or string.");
			
		if (is_string($levelCoordinates))
		{
			$coorArray = [];
			$count = 1;
			foreach(explode(";", $levelCoordinates) as $coor)
			{
				$coorArray[LevelsCoordinationInterface::INDEX_PREFIX.$count] = $coor;
				$count++;
			}
			$levelCoordinates = $coorArray;
		}
		
		if ($numLevels === null)
		{
			for($count=LevelsCoordinationInterface::MAX_LEVELS;$count>0;$count--)
			{
				if (isset($levelCoordinates[LevelsCoordinationInterface::INDEX_PREFIX.$count]))
				{
					$numLevels = $count;
					break;
				}
			}
		}
		
		if ($numLevels === null)
			throw new \InvalidArgumentException("Cannot determine number of levels.");
		
		for($i=$numLevels;$i>0;$i--)
		{
			if (isset($levelCoordinates[LevelsCoordinationInterface::INDEX_PREFIX.$i]))
			{
				for($j=$i-1;$j>0:$j--)
				{
					if (!isset($levelCoordinates[LevelsCoordinationInterface::INDEX_PREFIX.$j]))
						throw new \InvalidArgumentException("Coordinates invalid.");
				}
			}
		}
		
		parent::__construct(
			CoordinationTypes::TYPE_LEVELS,
			array(LevelsCoordinationInterface::NUM_LEVELS => $numLevels) + $levelCoordinates
		);
	}

	/**
	* @inheritdoc
	* 
	*/
	public function getNumLevels()
	{
		if ($this->hasCoordinate(LevelsCoordinationInterface::NUM_LEVELS))
		{
			return $this->getCoordinate(LevelsCoordinationInterface::NUM_LEVELS);
		}
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function setNumLevels($numLevels)
	{
		if (!is_integer($numLevels))
			throw new \InvalidArgumentException("'numLevels' parameter must be integer.");
		
		$this->setCoordinate(LevelsCoordinationInterface::NUM_LEVELS, $numLevels);
	}
	
	/**
	* @inheritdoc
	* 
	*/
	public function getLevelCoordinate($level)
	{
		return $this->getCoordinate(LevelsCoordinationInterface::INDEX_PREFIX.$level);

	/**
	* @inheritdoc
	* 
	*/
	public function setLevelCoordinate($level, $coordinate)
	{
		if (!is_scalar($coordinate))
			throw new \InvalidArgumentException("'coordinate' parameter must be scalar type.");
		
		$this->setCoordinate(LevelsCoordinationInterface::INDEX_PREFIX.$level, $coordinate);
	}
}
