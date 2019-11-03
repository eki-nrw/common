<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Extension\Fixtures;

class ObjName
{
	private $objectName;
	
	public function getObjectName()
	{
		return $this->objectName;
	}
	
	public function setObjectName($objectName)
	{
		$this->objectName = $objectName;
	}
}
