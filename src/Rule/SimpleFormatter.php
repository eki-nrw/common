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
class SimpleFormatter extends DelimeterStringFormatter
{
	/**
	* @inheritdoc
	*/
	protected function _createRuleData($expression, $name, $priority)
	{
		return new ArrayRuleData($expression, $name, $priority);
	}

	/**
	* @inheritdoc
	*/
	protected function _ruleDataToArray(RuleDataInterface $ruleData)
	{
		if (!$ruleData instanceof ArrayRuleData)
			throw new \InvalidArgumentException(sprintf("Rule data of Simple Formatter must be %s.", ArrayRuleData::class));
			
		return $ruleData->getData();
	}
}
