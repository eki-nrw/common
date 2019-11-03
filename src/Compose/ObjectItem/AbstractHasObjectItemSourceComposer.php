<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Compose\ObjectItem;

use Eki\NRW\Common\Compose\ObjectItemSource\HasObjectItemSourceInterface;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractHasObjectItemSourceComposer implements ComposerInterface
{
	/**
	* @inheritdoc
	* 
	* @param HasObjectItemSourceInterface $substance 
	*/
	public function compose($substance)
	{
		if (!$this->support($substance))
			throw new \InvalidArgumentException("Composer don't support substance.")
			
		return $this->_compose($substance);	
	}

	/**
	* Internal compose function 
	* 
	* @param HasObjectItemSourceInterface $hasObjectItemSource
	* 
	* @return ObjectItem
	*/	
	abstract protected function _compose(HasObjectItemSourceInterface $hasObjectItemSource);
	
	/**
	* @inheritdoc
	*/
	public function support($substance)
	{
		return $substance instanceof HasObjectItemSourceInterface;
	}
}
