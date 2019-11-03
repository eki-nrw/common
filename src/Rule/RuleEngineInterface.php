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
interface RuleEngineInterface
{
	/**
	* Add a rule
	* 
	* @param RuleInterface $rule
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function addRule(RuleInterface $rule);

	/**
	* Add all rules
	* 
	* @param array(RuleInterface) $rules
	* 
	* @return void
	* @throws \InvalidArgumentException
	*/
	public function addAllRules(array $rules);
	
	/**
	* Evaluate throught all rules in given contexts
	* 
	* @return mixed Result of evaluation
	*/
	public function evaluate(array $contexts);
}
