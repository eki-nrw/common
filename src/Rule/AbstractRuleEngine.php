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
abstract class AbstractRuleEngine implements RuleEngineInterface
{
	/**
	* @var RuleInterface[]
	*/
	private $rules = [];
	
	/**
	* @inheritdoc
	*/
	public function addRule(RuleInterface $rule)
	{
		if (!is_string($rule->getExpression()))
			throw new \InvalidArgumentException("Expression of rule must be string.");
		if (!is_string($rule->getKey()))
			throw new \InvalidArgumentException("Key of rule must be string.");
		if (!is_string($rule->getPriority()))
			throw new \InvalidArgumentException("Priority of rule must be number.");
		
		$this->rules[] = $rule;
	}

	/**
	* @inheritdoc
	*/
	public function addAllRules(array $rules)
	{
		$this->rules = [];
		foreach($rules as $rule)
		{
			$this->addRule($rule);
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function evaluate(array $contexts)
	{
		$rules = $this->rules;
		
		if (false === ($bSorted = usort($rules, 
			function ($r1, $r2) {
				return $r1->getPriority() - $r2->getPriority();
			}
		)))
			throw new \ErrorException("Unknown error when sorting of rules.");
		;
		
		return $this->_evaluate($rules, $contexts);
	}
	
	/**
	* Evaluate rules
	* 
	* @internal 
	* 
	* @param RuleInterface[] $rules
	* @param array $contexts
	* 
	* @return mixed
	* @throws
	*/
	abstract protected function _evaluate(array $rules, array $contexts);
}
