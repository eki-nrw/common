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
interface CodeInterface
{
    /**
     * @return mixed
     */
    public function getCode();
    
    /**
	* Set code
	* 
	* @param mixed $code
	* 
	* @return void
	*/
    public function setCode($code);
}
