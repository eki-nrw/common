<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface DocumentationInterface
{
	public function getShortDescription();
	public function setShortDescription($shortDescription);
	
	public function getDescription();
	public function setDescription($description);
	
	public function getNote();
	public function setNote($note);
}
