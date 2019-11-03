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
interface HasOptionsInterface
{
	public function getOptions();
	public function getOption($optionName);

	public function hasOption($optionName);
	
	public function setOption($optionName, $optionValue);
	public function setOptions(array $options);
}
