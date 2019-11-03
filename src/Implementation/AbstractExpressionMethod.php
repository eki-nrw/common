<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Implementation;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractExpressionMethod implements ImplementationMethodInterface
{
	/**
	* @var ExpressionLanguage
	*/
	protected $expressionLanguage; 

	/**
	* Sets expression laguage
	* 
	* @param ExpressionLanguage $expressionLanguage
	* 
	* @return void
	*/
	public function setExpressionLanguage(ExpressionLanguage $expressionLanguage)
	{
		$this->expressionLanguage = $expressionLanguage;
	}
	
	/**
	* @inheritdoc
	*/
	public function getMethodType()
	{
		return ImplementationMethodInterface::METHOD_EXPRESSION;
	}
	
	/**
	* @inheritdoc
	*/
	public function implement(ImplementationInterface $implementation)
	{
		$this->getResult(
			$this->expressionLanguage->evaluate(
				$implementation->getDefinition(), 
				$this->getExpressionValues()
			)
		);
	}
	
	/**
	* Returns expression values to evaluate expression
	* 
	* @return array
	*/
	abstract protected function getExpressionValues();
	
	/**
	* Returns result from evaluated string
	* 
	* @param string $evaluatedResult
	* 
	* @return mixed
	*/
	abstract protected function getResult($evaluatedResult);
}
