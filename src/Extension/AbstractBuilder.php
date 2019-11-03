<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Extension;

use Eki\NRW\Common\Element\ElementInterface;
use Eki\NRW\Common\Res\Factory\FactoryInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

use ReflectionClass;

/**
* @author Nguyen Tien Hy <ngtienhy@gmail.com>
*/
abstract class AbstractBuilder extends AbstractConfigBuilder implements BuilderInterface
{
	private $type;
	private $name;
	private $properties;
	private $options;
	private $attributes;
	private $elements;
	private $data;
	
	private static $propResolversByClass = []; 
	private static $optResolversByClass = []; 
	private static $attrResolversByClass = []; 

	/**
	* @var FactoryInterface
	*/
	protected $factory;
	
	/**
	* Constructor
	* 
	* @param mixed $type
	* @param array $extensions
	* @param FactoryInterface $factory
	* 
	*/
	public function __construct($type, array $extensions = [], FactoryInterface $factory = null)
	{
		$this->type = $type;
		$this->factory = $factory;
		
		parent::__construct($extensions);		
	}

	/**
	* @inheritdoc
	*/	
	public function setName($name)
	{
		$this->name = $name;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function addProperty($propertyName, array $propertyValue, array $contexts = [])
	{
		if ($this->properties === null)
			$this->properties = [];
		
		if (isset($this->properties[$propertyName]))
			throw new \LogicException(sprintf('Property wih name %s already added.', $propertyName));	
			
		$this->properties[$propertyName] = $propertyValue;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function setProperty($propertyName, array $propertyValue)
	{
		if (!isset($this->properties[$propertyName]))
			throw new \LogicException(sprintf('Property %s must be added to builder by addProperty function. setProperty method used to override only.', $propertyName));

		unset($this->properties[$propertyName]);			
		$this->properties[$propertyName] = $propertyValue;
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/	
	public function addOption($optionName, array $optionValue, array $contexts = [])
	{
		if ($this->options === null)
			$this->options = [];
		
		if (isset($this->options[$optionName]))
			throw new \LogicException(sprintf('Option wih name %s already added.', $optionName));	
			
		$this->options[$optionName] = $optionValue;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function setOption($optionName, array $optionValue)
	{
		if (!isset($this->options[$optionName]))
			throw new \LogicException(sprintf('Option %s must be added to builder by addProperty function. setOption method used to override only.', $optionName));

		unset($this->options[$optionName]);			
		$this->options[$optionName] = $optionValue;
		
		return $this;
	}
		
	/**
	* @inheritdoc
	*/	
	public function setData($name, $data, array $contexts = [])
	{
		if (is_scalar($data))
			throw new \InvalidArgumentException("data must be not scalar.");
		
		if ($this->data === null)
			$this->data = [];
			
		if (isset($this->data[$name]))
			throw new \LogicException(sprintf('Data wih name %s already added.', $name));	
		
		$this->data[$name] = $data;

		return $this;
	}
	
	/**
	* @inheritdoc
	*/	
	public function setAttribute($attrName, $attrValue, array $contexts = [])
	{
		if ($this->attributes === null)
			$this->attributes = [];
		
		if (isset($this->attributes[$attrName]) && $attrValue === null)
			unset($this->attributes[$attrName]);
		else
			$this->attributes[$attrName] = $attrValue;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function addElement(ElementInterface $element)
	{
		if ($this->elements === null)
			$this->elements = [];
			
		if (isset($this->elements[$element->getElementName()]))
			throw new \LogicException(sprintf('Element with name %s already exists.', $element->getElementName()));
			
		$this->elements[$element->getElementName()] = $element;
		
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function objectHasProperties()
	{
		if ($this->properties === null)
			$this->properties = [];
			
		return $this;
	}
	
	/**
	* @inheritdoc
	*/	
	public function objectHasOptions()
	{
		if ($this->options === null)
			$this->options = [];
			
		return $this;
	}

	/**
	* @inheritdoc
	*/	
	public function objectHasAttributes()
	{
		if ($this->attributes === null)
			$this->attributes = [];
			
		return $this;
	}

	protected function createSubjectIfAny()
	{
		if (null !== ($subject = $this->getConfigSubject()))
			return $subject;
		
		if ($this->type === null)
		{
			throw new \UnexpectedValueException('No type specified to build.');
		}

		//$subject = $this->getFactory()->createNew($this->type);
		
		if ($this->factory === null)
			throw new \LogicException("No factory to create new subject.");
		
		$subject = $this->factory->createNew($this->type);
		if (null === $subject)
			throw new \UnexpectedValueException('Created object is null. Unknown error.');
			
		return $subject;
	}

	/**
	* @inheritdoc
	*/	
	public function get()
	{
		// Create object if any
		$object = $this->createSubjectIfAny();

		// Checks if the object is valid for the builder			
		$this->validateObject($object);
		
		//--- Initial
		$this->initialize($object);
		
		$accessor = PropertyAccess::createPropertyAccessor();
		$objectClass = get_class($object);
		$reflection = new ReflectionClass($objectClass);
		
		//--- Prepare building
		if ($accessor->isWritable($object, 'objectName') and !empty($this->naming()))
			$accessor->setValue($object, 'objectName', $this->naming());

		// Built-in object properties
		if (!isset(self::$propResolversByClass[$objectClass]) and $reflection->hasMethod('configureProperties'))
		{
			self::$propResolversByClass[$objectClass] = new OptionsResolver();
			$object->configureProperties(self::$propResolversByClass[$objectClass]);
		}

		// Built-in object options
		if (!isset(self::$optResolversByClass[$objectClass]) and $reflection->hasMethod('configureOptions'))
		{
			self::$optResolversByClass[$objectClass] = new OptionsResolver();
			$object->configureOptions(self::$optResolversByClass[$objectClass]);
		}

		// Built-in object attributes
		if (!isset(self::$attrResolversByClass[$objectClass]) and $reflection->hasMethod('configureAttributes'))
		{
			self::$attrResolversByClass[$objectClass] = new OptionsResolver();
			$object->configureAttributes(self::$attrResolversByClass[$objectClass]);
		}
		
		// Build from extensions
		$this->buildFromExtensions($object);
		
		// Build from DependencyInjection, if any
		$this->buildFromDependencyInjection($object);

		// From resource type (self)
		if ($object instanceof BuildInterface)
			$object->build($this);

		//--- Build object by object-self
		if ($this->properties !== null)
		{
			if (isset(self::$propResolversByClass[$objectClass]))
				$properties = self::$propResolversByClass[$objectClass]->resolve($this->properties);
			else
				$properties = $this->properties;
			
			$accessor->setValue($object, 'properties', $properties);
		}

		if ($this->options !== null)
		{
			if (isset(self::$optResolversByClass[$objectClass]))
				$options = self::$optResolversByClass[$objectClass]->resolve($this->options);
			else
				$options = $this->options;
			
			$accessor->setValue($object, 'options', $options);
		}

		if ($this->attributes !== null)
		{
			if (isset(self::$attrResolversByClass[$objectClass]))
				$attributes = self::$attrResolversByClass[$objectClass]->resolve($this->attributes);
			else
				$attributes = $this->attributes;
			
			$accessor->setValue($object, 'attributes', $attributes);
		}

		if ($this->data !== null)
		{
			$accessor->setValue($object, 'objectData', $this->data);
		}
		if ($this->elements !== null)
		{
			foreach($this->elements as $element)
			{
				$accessor->setValue($object, 'element', $element);
			}
		}
		
		// Normalize before return
		if ($object instanceof NormalizeInterface)
			$object->normalize();		

		// Ready object
		return $object;
	}
	
	/**
	* Validate object
	* 
	* @param object $object
	* 
	* @return void
	* @throws \DomainException
	*/
	protected function validateObject($object)
	{
		$accessor = PropertyAccess::createPropertyAccessor();
		
		if ($this->properties !== null and !$accessor->isWritable($object, 'properties'))
			throw new \UnexpectedValueException("Cannot write properties to object.");
		
		if ($this->options !== null and !$accessor->isWritable($object, 'options'))
			throw new \UnexpectedValueException("Cannot write options to object.");

		if ($this->attributes !== null and !$accessor->isWritable($object, 'attributes'))
			throw new \UnexpectedValueException("Cannot write attributes to object.");

		if ($this->data !== null)
		{
 			if (!$accessor->isWritable($object, 'objectData'))
 				throw new \UnexpectedValueException("Cannot write data to object.");
		}

		if ($this->elements !== null)
		{
 			if (!$accessor->isWritable($object, 'element'))
 				throw new \UnexpectedValueException("Cannot write elements to object.");
		}
	}

	/**
	* Initialze before buidling
	* 
	* @param object $object
	* 
	* @return void
	*/
	protected function initialize($object)
	{
		foreach($this->getExtensions() as $extension)
		{
			if (!$extension->support($object, ExtensionPositions::POS_INITIAL))
				continue;

			if ($extension instanceof BuildInterface)
				$extension->build($this, array('extension_position' => ExtensionPositions::POS_INITIAL));
				
			$extension->apply($object, ExtensionPositions::POS_INITIAL);
		}
	}
	
	protected function naming()
	{
		if (!empty($this->name))
			return $this->name;
	}
	
	protected function buildFromExtensions($object)
	{
		foreach($this->getExtensions() as $name => $extension)
		{
			if (!$extension->support($object, ExtensionPositions::POS_BUILD))
				continue;
				
			if ($extension instanceof BuildInterface)
				$extension->build($this, array('extension_position' => ExtensionPositions::POS_BUILD));
		}
	}
	
	/**
	* Build from depndency injection. This function provide an opportunity to setup from something
	* 
	* @param object $object
	* 
	* @return void
	*/
	protected function buildFromDependencyInjection($object)
	{
		//...
	}
}
