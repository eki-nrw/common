<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Res\Exception;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class UnsupportedMethodException extends \Exception
{
    /**
     * @param string $methodName
     */
    public function __construct($methodName)
    {
        parent::__construct(sprintf(
            'The method "%s" is not supported.',
            $methodName
        ));
    }
}
