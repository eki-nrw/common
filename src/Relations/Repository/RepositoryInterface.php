<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Repository;

use Eki\NRW\Common\Res\Repository\RepositoryInterface as BaseRepositoryInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface RepositoryInterface extends BaseRepositoryInterface
{
	/**
	* Find all relations with base object, relation type, type
	* 
	* @param object $obj
	* @param string $relationType
	* @param string|null $type
	* 
	* @return RelationInterface[]
	*/
	public function findOnBase($base, $relationType, $type = null);

	/**
	* Find all relations with base object that has name, relation type, type
	* 
	* @param string $name
	* @param string $relationType
	* @param string|null $type
	* 
	* @return RelationInterface[]
	*/
	public function findOnBaseByName($name, $relationType, $type = null);
	
	/**
	* Find all relations with other object, relation type, type, key
	* 
	* @param object $obj
	* @param string $relationType
	* @param string $type
	* @param string $key
	* 
	* @return RelationInterface[]
	*/
	public function findOnOther($other, $relationType, $type, $key);

	/**
	* Find all relations with other object that has name, relation type, type, key
	* 
	* @param string $name
	* @param string $relationType
	* @param string $type
	* @param string $key
	* 
	* @return RelationInterface[]
	*/
	public function findOnOtherByName($name, $relationType, $type, $key);
}
