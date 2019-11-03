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
class UnexpectedTypeException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     * @param string $expectedType
     */
    public function __construct($value, $expectedType)
    {
        parent::__construct(sprintf(
            'Expected argument of type "%s", "%s" given.',
            $expectedType,
            is_object($value) ? get_class($value) : gettype($value)
        ));
    }
}
