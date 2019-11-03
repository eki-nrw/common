<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Extension;

use Symfony\Component\OptionsResolver\OptionsResolver; 

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
trait BaseBuildSubjectTrait
{
	protected $objectData; 
	
	/**
	* @inheritdoc
	*/
	public function setObjectData($objectData)
	{
		$this->objectData = $objectData;
	}
	
	/**
	* @inheritdoc
	*/
	public function getObjectData()
	{
		return $this->objectData;
	}
	
	/**
	* @inheritdoc
	*/
	public function setObjectName($name)
	{
		$this->setName();
	}	
	
	/**
	* @inheritdoc
	*/
    public function configureOptions(OptionsResolver $resolver)
    {
		//
	}

	/**
	* @inheritdoc
	*/
    public function configureProperties(OptionsResolver $resolver)
    {
		//
	}

	/**
	* @inheritdoc
	*/
    public function configureAttributes(OptionsResolver $resolver)
    {
	}
}
