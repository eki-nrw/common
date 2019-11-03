<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Participating;

use Eki\NRW\Common\Common\HasAttributesInterface;
use Eki\NRW\Common\Common\HasPropertiesInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface PartnerInterface extends
	HasAttributesInterface,
	HasPropertiesInterface
{
	/**
	* Returns Index of partner
	* 
	* Ex.: 'A', 'B', 'C'
	* 
	* @return string
	*/
	public function getIndex();
	
	/**
	* Sets index of parnter
	* 
	* @param string $index
	* 
	* @return void
	*/
	public function setIndex($index);
	
	/**
	* Returns name of partner
	* 
	* @return string
	*/
	public function getName();
	
	/**
	* Sets the name of partner
	* 
	* @param string $name
	* 
	* @return void
	*/
	public function setName($name);
	
	/**
	* Returns the actor
	* 
	* @return mixed
	*/
	public function getActor();
	
	/**
	* Sets actor
	* 
	* @param mixed $actor
	* 
	* @return void
	* @throws
	*/
	public function setActor($actor);
}
