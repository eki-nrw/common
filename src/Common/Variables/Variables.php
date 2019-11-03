<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common\Variables;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class Variables implements VariablesInterface
{
	use
		VariablesTrait
	;
	
	public function __connstruct(array $initVariables = [])
	{
		$this->setAll($initVariables);
	}
}
