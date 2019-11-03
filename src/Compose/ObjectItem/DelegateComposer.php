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

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class DelegateComposer implements ComposerInterface
{
	/**
	* @var ComposerInterface[]
	*/
	private $composers = [];
	
	public function __construct(array $composers)
	{
		foreach($composers as $composer)
		{
			if (!$compose instanceof ComposerInterface)
				throw new \InvalidArgumentException(sprintf(
					"Composer must be instance of %s. Given %s.",
					ComposerInterface::class,
					get_class($composer)
				));
		}
		
		$this->composers = $composers;
	}
	
	/**
	* @inheritdoc
	*/
	public function compose($substance)
	{
		foreach($this->composers as $composer)
		{
			if ($composer->support($substance))
			{
				return $compose->compose($substance);
			}
		}
	}

	/**
	* @inheritdoc
	*/
	public function support($substance)
	{
		foreach($this->composers as $composer)
		{
			if ($composer->support($substance) === true)
				return true;
		}
		
		return false;
	}
}
