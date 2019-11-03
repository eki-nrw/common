<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Location;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class AddressCoordination extends Coordination implements AddressCoordinationInterface
{
	public function __construct(
		$line1 = '', $line2 = '',
		$province = '', $state = '', $country = '', $postCode = '',
		CoordinateValidatorInterface $validator = null
	)
	{
		parent::__construct(
			CoordinationTypes::TYPE_ADDRESS,
			array(
				AddressCoordinationInterface::ADDRESS_COUNTRY_KEY => $country,
				AddressCoordinationInterface::ADDRESS_STATE_KEY => $state,
				AddressCoordinationInterface::ADDRESS_PROVINCE_KEY => $province,
				AddressCoordinationInterface::ADDRESS_LINE_1_KEY => $line1,
				AddressCoordinationInterface::ADDRESS_LINE_2_KEY => $line2,
				AddressCoordinationInterface::ADDRESS_POST_CODE_KEY => $postCode,
			),
			$validator
		);
	}

	/**
	* @inheritdoc
	*/
	public function getCountry()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_COUNTRY_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setCountry($country)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_COUNTRY_KEY, $country);
	}

	/**
	* @inheritdoc
	*/
	public function getState()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_STATE_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setState($state)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_STATE_KEY, $state);
	}
	
	/**
	* @inheritdoc
	*/
	public function getProvince()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_PROVINCE_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setProvince($province)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_PROVINCE_KEY, $province);
	}
	
	/**
	* @inheritdoc
	*/
	public function getLine1()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_LINE_1_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setLine1($line1)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_LINE_1_KEY, $line1);
	}
	
	/**
	* @inheritdoc
	*/
	public function getLine2()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_LINE_2_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setLine2($line2)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_LINE_2_KEY, $line2);
	}
	
	/**
	* @inheritdoc
	*/
	public function getPostCode()
	{
		return $this->getCoordinate(AddressCoordinationInterface::ADDRESS_POST_CODE_KEY);
	}
	
	/**
	* @inheritdoc
	*/
	public function setPostCode($postCode)
	{
		$this->setCoordinate(AddressCoordinationInterface::ADDRESS_POST_CODE_KEY, $postCode);
	}
}
