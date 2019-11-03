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
class Node implements NodeInterface
{
	use NodeTrait;

	public function __construct($name = '', $obj = null)
	{
		$this->nodeName = $name;
		$this->setObject($obj);
	}
}
