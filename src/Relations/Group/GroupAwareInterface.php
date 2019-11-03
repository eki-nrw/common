<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Relations\Group;

/**
* Grouping of nodes that has a base node as 'group'
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface GroupAwareInterface
{
	public function setGroup(GroupingInterface $grouping = null);
}
