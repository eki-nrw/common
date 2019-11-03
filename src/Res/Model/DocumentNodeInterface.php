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
* Interface for ODM document
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface DocumentNodeInterface
{
    /**
	* Returns node name that used in document 
	* 
	* @return mixed
	*/
    public function getNodeName();
    
    /**
	* Get parent document
	* 
	* @return object
	*/
    public function getParentDocument();
}
