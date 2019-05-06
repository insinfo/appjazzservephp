<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 08/01/2019
 * Time: 15:41
 */

namespace AppJazz\Util;


class Utils
{
    public static function isSetOrNull($array,$key){

        if(array_key_exists($key,$array)){

            if($array[$key] != null && $array[$key] != 'null') {
                return true;
            }
        }
        return false;
    }

    public static function isSetOrNullOrEmpty($array,$key){

        if(array_key_exists($key,$array)){

            if($array[$key] != null && $array[$key] != 'null' && $array[$key] != '') {
                return true;
            }
        }
        return false;
    }
}