<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait HasParametersTrait
{
	/**
	* @var array(mixed)
	*/
	protected $parameters = [];
	
	/**
	* @inheritdoc
	*/
	public function setParameter($name, $value)
	{
		$this->parameters[$name] = $value;
	}
	
	/**
	* @inheritdoc
	*/
	public function getParameter($name, $default = null)
	{
		if (isset($this->parameters[$name]))
			return $this->parameters[$name];
		else
			return $default;
	}
	
	/**
	* @inheritdoc
	*/
	public function hasParameter($name)
	{
		return isset($this->parameters[$name]);
	}
	
	/**
	* @inheritdoc
	*/
	public function setParameters(array $parameters)
	{
		$this->parameters = [];
		foreach($parameters as $name => $value)
		{
			$this->setParameter($name, $value);
		}
	}
	
	/**
	* @inheritdoc
	*/
	public function getParameters()
	{
		return $this->parameters;
	}
}
