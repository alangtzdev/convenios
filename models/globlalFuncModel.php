<?php
class GlobalFunctModel
{
    public static function utf8Size($arrayResult)
    {
        if (is_array($arrayResult)) {
            foreach ($arrayResult as $key => $value) {
                $arrayResult[$key] = GlobalFunctModel::utf8Size($value);
            }
        } elseif (is_string($arrayResult)) {
            return utf8_encode($arrayResult);
        }
        return $arrayResult;
    }

    public function utf8_string_array_encode($array)
    {
        $func = function($value,$key){
            if(is_string($value)){
                $value = utf8_encode($value);
            }
            if(is_string($key)){
                $key = utf8_encode($key);
            }
            if(is_array($value)){
                utf8_string_array_encode($value);
            }
        };
        array_walk($array,$func);
        return $array;
    }
}
