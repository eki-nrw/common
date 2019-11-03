<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Model;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait DocumentNodeTrait
{
	protected $nodeName;
	protected $parentDocument;
		
	/**
	* @inheritdoc
	*/
    public function getNodeName()
    {
		return $this->nodeName;
	}

	/**
	* @inheritdoc
	*/
    public function getParentDocument()
    {
		return $this->parentDocument;
	}
}
