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

class ObjData
{
	private $data;
	
	public function getObjectData()
	{
		return $this->data;
	}
	
	public function setObjectData(array $data)
	{
		$this->data = $data;
	}
}
