<?php

namespace Core;
// validating the input

class Validator
{
    // max value infinite and min is 1 char 
    public static function string($value, $min = 1, $max = INF)
    {
        // trim the input from any whitespace
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
 // Use filter_var to check if the value is a valid email address
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
