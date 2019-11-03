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
trait MagicPropertiesTrait
{
	const CODE_PROPERTY_NOT_FOUND = 1;
	const CODE_PROPERTY_READONLY = 2;
	
    /**
     * Magic set function handling writes to non public properties.
     *
     * @ignore This method is for internal use
     *
     * @throws \InvalidArgumentException with $code = static::CODE_PROPERTY_NOT_FOUND when property does not exist
     * @throws \InvalidArgumentException with $code = static::CODE_PROPERTY_READONLY when property is readonly (protected)
     *
     * @param string $property Name of the property
     * @param string $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
        	$this->_propertyNotFound($property);
        }
        $this->_propertyIsReadOnly($property);
    }
    
    private function _propertyNotFound($property)
    {
        throw new \InvalidArgumentException(
        	sprintf(
        		"Property %s of object class %s not found.",
        		$property, get_class($this)
        	),
        	static::CODE_PROPERTY_NOT_FOUND
        );
	}
	
	private function _propertyIsReadOnly($property)
	{
        throw new \InvalidArgumentException(
        	sprintf(
        		"Property %s of object class %s is read-only.",
        		$property, get_class($this)
        	),
        	static::CODE_PROPERTY_READONLY
        );
	}

    /**
     * Magic get function handling read to non public properties.
     *
     * Returns value for all readonly (protected) properties.
     *
     * @ignore This method is for internal use
     *
     * @throws \InvalidArgumentException with $code = static::CODE_PROPERTY_NOT_FOUND when property does not exist
     *
     * @param string $property Name of the property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        $this->_propertyNotFound($property);
    }

    /**
     * Magic isset function handling isset() to non public properties.
     *
     * Returns true for all (public/)protected/private properties.
     *
     * @ignore This method is for internal use
     *
     * @param string $property Name of the property
     *
     * @return bool
     */
    public function __isset($property)
    {
        return property_exists($this, $property);
    }

    /**
     * Magic unset function handling unset() to non public properties.
     *
     * @ignore This method is for internal use
     *
     * @throws \InvalidArgumentException with $code = static::CODE_PROPERTY_NOT_FOUND when property does not exist
     * @throws \InvalidArgumentException with $code = static::CODE_PROPERTY_READONLY when property is readonly (protected)
     *
     * @uses ::__set()
     *
     * @param string $property Name of the property
     *
     * @return bool
     */
    public function __unset($property)
    {
        $this->__set($property, null);
    }

    /**
     * Returns a new instance of this class with the data specified by $array.
     *
     * $array contains all the data members of this class in the form:
     * array('member_name'=>value).
     *
     * __set_state makes this class exportable with var_export.
     * var_export() generates code, that calls this method when it
     * is parsed with PHP.
     *
     * @ignore This method is for internal use
     *
     * @param mixed[] $array
     *
     * @return ValueObject
     */
    public static function __set_state(array $array)
    {
        return new static($array);
    }
}
