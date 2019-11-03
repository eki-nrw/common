<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Testing\Repository;

use Doctrine\Common\Persistence\ObjectRepository;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface RepositoryInterface extends ObjectRepository
{
    /**
     * @param mixed $res
     */
    public function add($res);

    /**
     * @param mixed $resource
     */
    public function remove($res);
}
