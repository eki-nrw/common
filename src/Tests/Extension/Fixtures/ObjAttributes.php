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

class ObjAttributes
{
	private $attributes;
	
	public function getAttributes()
	{
		return $this->attributes;
	}
	
	public function setAttributes(array $attributes)
	{
		$this->attributes = $attributes;
	}
	
	public function configureAttributes(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'number' => 10,
			'url' => null,
		));

		$resolver->setDefined('number');
		$resolver->setDefined('url');
		$resolver->setDefined('nickname');
		$resolver->setDefined('info');
		$resolver->setDefined('image');

		$resolver->setAllowedTypes('number', array('int', 'float'));
		$resolver->setAllowedTypes('url', array('string', 'null'));
		$resolver->setAllowedTypes('nickname', array('string'));
		$resolver->setAllowedTypes('info', array('string', 'array', 'null'));
		$resolver->setAllowedTypes('image', array('object', 'null'));
	}
}
