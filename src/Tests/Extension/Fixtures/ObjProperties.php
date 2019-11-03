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

class ObjProperties
{
	private $properties;
	
	public function getProperties()
	{
		return $this->properties;
	}
	
	public function setProperties(array $properties)
	{
		$this->properties = $properties;
	}
	
	public function configureProperties(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'one' => array(1),
			'a_prop' => array('A property'),
		));
		$resolver->setDefined('group_1');
		$resolver->setAllowedTypes('group_1', array('array'));
	}
}
