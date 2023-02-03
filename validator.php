<?php

class Validator
{

    public static function string($value, $min = 1, $max = INF)
    {

        // trim the blank spaces for validation
        $value = trim($value);
        // the length is greater or equal to 1 and also less than or equal max
        return strlen($value) >= $min && strlen($value) <= $max;
    }


// email validation

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}