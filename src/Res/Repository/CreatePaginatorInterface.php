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
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
interface CreatePaginatorInterface
{
    const ORDER_ASCENDING = 'ASC';
    const ORDER_DESCENDING = 'DESC';

    /**
     * @param array $criteria
     * @param array $sorting
     *
     * @return mixed
     */
    public function createPaginator(array $criteria = [], array $sorting = []);
}
