<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Common;

/**
 * Interface implemented by everything which should be translatable. This
 * should for example be implemented by any exception, which might bubble up to
 * a user, or validation errors.
 */
interface Translatable
{
    /**
     * Returns a translatable Message.
     *
     * @return \Eki\NRW\Common\Common\Values\Translation
     */
    public function getTranslatableMessage();
}
