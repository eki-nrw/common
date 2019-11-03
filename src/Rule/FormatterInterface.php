<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Rule;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface FormatterInterface
{
	/**
	* Converts to rule data
	* 
	* @param mixed $data
	* 
	* @return RuleDataInterface
	*/
	public function toRuleData($data);
	
	/**
	* Converts to formatted data from rule datas
	* 
	* @param array|RuleDataInterface[] $ruleData
	* 
	* @return mixed Formatted data
	*/
	public function fromRuleData(array $ruleData);
	
	/**
	* Checks if data is valid or not
	* 
	* @param mixed $data
	* 
	* @return bool
	*/
	public function checkValid($data);
	
	/**
	*  Validate formatted data
	* 
	* @param mixed $data
	* 
	* @return void
	* @throws
	*/
	public function validate($data);
}
