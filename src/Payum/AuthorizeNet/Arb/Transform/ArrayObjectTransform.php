<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/4/18
 * Time: 11:59 PM
 */

namespace Payum\AuthorizeNet\Arb\Transform;

trait ArrayObjectTransform
{
    protected function toArrayObject($object, $model)
    {
        if (!$model)
            $model = new \ArrayObject();

        if (\is_object($object)) {
            $refClass = new \ReflectionClass(\get_class($object));

            $properties = $refClass->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);

            foreach ($properties as $property) {
                $getterMethod = "get" . ucfirst($property->getName());

                if (!$refClass->hasMethod($getterMethod)) continue;

                $value = $object->$getterMethod();

                if (\is_object($value) && isset($model[$property->getName()])) {
                    $this->toArrayObject($value, $model[$property->getName()]);
                } else {
                    $model[$property->getName()] = $value;
                }
            }
        }
    }

    protected function toInstanceOfClass($object, $class)
    {
        throw new \Exception('toInstanceOfClass not implemented yet');
    }
}