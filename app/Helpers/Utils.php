<?php

namespace App\Helpers;

class Utils
{

    public static function format_price($price): string
    {
        return number_format($price, 0, '.', ',');
    }

    public static $PROFILE_IMAGE = 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e/?s=128&r=g&d=mm';


    public static function get_profile_image($image) : string
    {
        return $image === null ? self::$PROFILE_IMAGE : asset('storage/' . $image);
    }
}
