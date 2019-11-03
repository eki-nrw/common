<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Testing\Repository\Exception;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class ExistingResourceException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Given resource already exists in the repository.');
    }
}
