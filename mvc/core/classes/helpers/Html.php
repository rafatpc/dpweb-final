<?php
namespace Core\Classes\Helpers;

class Html 
{
    public static function link($href)
    {
        return '<link rel="stylesheet" href="' . \Config::get('global.url') . $href . '" />';
    }
    
    public static function anchor($href, $name, $options)
    {
        return '<a href="' . \Config::get('global.url') . $href . '" '. $options .'>' . $name . '</a>';
    }
}