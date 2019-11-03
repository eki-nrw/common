<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Tests\Fixtures;

use Eki\NRW\Common\Relations\AbstractRelation;
use Eki\NRW\Common\Res\Model\ResTrait;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class RelationBB extends AbstractRelation implements RelationInterface
{
	use
		ResTrait
	;

	/**
	* @inheritdoc
	*/
	public static function getRelationType()
	{
		return 'BB';
	}
}
