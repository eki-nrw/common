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
trait InfoTrait
{
	private $infoLines = [];
	
	/**
	* @inheritdoc
	*/
	public function getInfo()
	{
		$info = "";
		foreach($this->infoLines as $line)
		{
			$info .= $line . "\n";
		}
		
		return $info;
	}

	/**
	* @inheritdoc
	*/
	public function addInfoLine($infoLine)
	{
		$this->infoLines[] = $infoLine;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/
	public function removeInfoLine($lineNo)
	{
		if (isset($this->infoLines[$lineNo]))
			unset($this->infoLines[$lineNo]);

		return $this;
	}

	/**
	* @inheritdoc
	*/
	public function removeAllInfoLines()
	{
		$this->infoLines = [];

		return $this;
	}
}
