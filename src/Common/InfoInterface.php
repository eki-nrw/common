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
interface InfoInterface
{
	/**
	* Get all info lines
	* 
	* @return string
	*/
	public function getInfo();
	
	/**
	* Add a line of info
	* 
	* @param string $infoLine
	* 
	* @return this
	*/
	public function addInfoLine($infoLine);
	
	/**
	* Remove a line of info
	* 
	* @param int $lineNo
	* 
	* @return this
	*/
	public function removeInfoLine($lineNo);
	
	/**
	* Reset info
	* 
	* @return thid
	*/
	public function removeAllInfoLines();
}
