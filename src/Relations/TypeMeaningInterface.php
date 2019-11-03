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
interface TypeMeaningInterface
{
	const RELATION_TYPE_CHAIN_DELIMETER = '|';
	const INDEX_DOMAIN = 0;
	const INDEX_CATEGORIZATION_TYPE = 1;
	const INDEX_MAIN_TYPE = 2;
	const INDEX_SUB_TYPE = 3;
	const INDEX_MIN = self::INDEX_DOMAIN;
	const INDEX_MAX = self::INDEX_SUB_TYPE;

	/**
	* Return type chain
	* 
	* @param string $type
	* 
	* @return string[]
	* 	[0]: always <domain>. Ex:. 'rea'
	* 	[1][...]: Ex.: 'association' | 'custody' | ...
	*/
	public function getTypeChain($type = null);

	/**
	* Get relation domain
	* 
	* @return string
	*/
	public function getRelationDomain();

	/**
	* Get relation categorization type
	* 
	* @return string
	*/
	public function getCategorizationType();

	/**
	* Get relation main type
	* 
	* @return string
	*/
	public function getMainType();

	/**
	* Get relation sub type
	* 
	* @return string
	*/
	public function getSubType();
	
	/**
	* Compose type elements to set type of relations
	* 
	* @param string $domain
	* @param string $categorization
	* @param string $main
	* @param string|null $sub
	* 
	* @return mixed
	* 
	* @throws \InvalidArgumentException
	*/
	static public function composeTypes($domain, $categorization, $main, $sub);
}
