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
trait HasOptionsTrait
{
	protected $options = [];
	
	public function getOptions()
	{
		return $this->options;
	}
	
	public function getOption($optionName)
	{
		if (isset($this->options[$optionName]))
			return $this->options[$optionName];
	}

	public function hasOption($optionName)
	{
		return isset($this->options[$optionName]);
	}
	
	public function setOption($optionName, $optionValue)
	{
		if (null !== $optionValue)
			$this->options[$optionName] = $optionValue;
		else
			unset($this->options[$optionName]);
	}
	
	public function setOptions(array $options)
	{
		$this->options = [];
		foreach($options as $optionName => $optionValue)
		{
			$this->setOption($optionName, $optionValue);
		}
	}
}
