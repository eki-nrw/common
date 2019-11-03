<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Extension\Fixtures;

use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjOptions
{
	private $options;
	
	public function getOptions()
	{
		return $this->options;
	}
	
	public function setOptions(array $options)
	{
		$this->options = $options;
	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'one' => array(1),
			'an_opt' => array('An option'),
		));
		$resolver->setDefined('group_1');
		$resolver->setAllowedTypes('group_1', array('array'));
	}
}
