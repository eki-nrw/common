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
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractRelation implements RelationInterface, TypeMeaningInterface
{
	use 
		RelationTrait,
		HasParametersTrait,
		TypeMeaningTrait
	;

	/**
	* Constructor
	* 
	* @param string $type
	* 
	*/
	public function __construct($type)
	{
		$this->type = $type;
	}
}
