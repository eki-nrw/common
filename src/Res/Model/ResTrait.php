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
trait ResTrait
{
	protected $id;
	
    /**
     * @return mixed
     */
    public function getId()
    {
		return $this->id;
	}
}
