<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Repository;

use Eki\NRW\Common\Res\Model\ResInterface;

/**
* Res (Resource) as Subject
* 
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface ResSubjectInterface
{
    /**
     * @param ResInterface $res
     */
    public function addResource(ResInterface $res);

    /**
     * @param ResInterface $resource
     */
    public function removeResource(ResInterface $res);

    /**
     * @param ResInterface $resource
     */
    public function updateResource(ResInterface $res);
}
