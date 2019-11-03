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
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
class ValueObject
{
	use
		MagicPropertiesTrait
	;

    /**
     * Construct object optionally with a set of properties.
     *
     * Readonly properties values must be set using $properties as they are not writable anymore
     * after object has been created.
     *
     * @param array $properties
     */
    public function __construct(array $properties = array())
    {
        foreach ($properties as $property => $value) {
            $this->$property = $value;
        }
    }

    /**
     * Function where list of properties are returned.
     *
     * Used by {@see attributes()}, override to add dynamic properties
     *
     * @uses ::__isset()
     *
     * @todo Make object traversable and reuse this function there (hence why this is not exposed)
     *
     * @param array $dynamicProperties Additional dynamic properties exposed on the object
     *
     * @return array
     */
    protected function getProperties($dynamicProperties = array())
    {
        $properties = $dynamicProperties;
        foreach (get_object_vars($this) as $property => $propertyValue) {
            if ($this->__isset($property)) {
                $properties[] = $property;
            }
        }

        return $properties;
    }
}
