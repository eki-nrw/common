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
trait DocumentationTrait
{
	protected $short_description;
	protected $description;
	protected $note;

	public function getShortDescription()
	{
		return $this->short_description;
	}
	
	public function setShortDescription($shortDescription)
	{
		$this->shortDescription = $shortDescription;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	public function getNote()
	{
		return $this->note;
	}
	
	public function setNote($note)
	{
		$this->note = $note;
	}
}
