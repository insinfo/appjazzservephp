<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 02/01/2019
 * Time: 18:45
 */

namespace AppJazz\Services;
use \ReflectionClass;

trait TraitFillFromArray
{
    public function fillFromArray($dataArray)
    {
        if ($dataArray != null) {
            foreach ($dataArray as $key => $val) {
                if (property_exists(__CLASS__, $key)) {
                    $this->$key = $val;
                }
            }
        }
        return $this;
    }

    public function toArray($privatePropertyOnly = true)
    {
        $reflectionClass = new ReflectionClass(__CLASS__);//get_class($object));
        $array = array();

        foreach ($reflectionClass->getProperties() as $property) {

            if($privatePropertyOnly) {
                if ($property->isPrivate()) {
                    $property->setAccessible(true);
                    $array[$property->getName()] = $property->getValue($this);//__CLASS__
                    $property->setAccessible(false);
                }
            }else{
                $property->setAccessible(true);
                $array[$property->getName()] = $property->getValue(__CLASS__);
                $property->setAccessible(false);
            }

        }

        return $array;
    }
}