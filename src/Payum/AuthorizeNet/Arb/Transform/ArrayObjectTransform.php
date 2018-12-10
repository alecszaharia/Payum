<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 11:59 PM
 */

namespace Transform;

trait ArrayObjectTransform
{
    protected function toArrayObject($object)
    {
        $return = new \ArrayObject();

        if (\is_object($object)) {
            $refClass = new \ReflectionClass(\get_class($object));

            $properties = $refClass->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);

            foreach ($properties as $property) {
                $getterMethod = "get" . ucfirst($property->getName());

                if (!$refClass->hasMethod($getterMethod)) continue;

                $value = $object->$getterMethod();

                if (\is_object($value)) {
                    $return[$property->getName()] = $this->toArrayObject($value);
                } else {
                    $return[$property->getName()] = $value;
                }
            }
        }
    }

    protected function toInstanceOfClass($object, $class)
    {
        throw new \Exception('toInstanceOfClass not implemented yet');
    }
}