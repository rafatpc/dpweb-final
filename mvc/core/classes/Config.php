<?php
namespace Core\Classes;

class Config
{
    private static $loaded = array();
	
    public static function load($name)
    {
        if(empty($name))
        {
            throw new \Exception('The config file name is empty.');
        }
        $_file = realpath(CONFIG . $name . '.php');

        if ($_file != FALSE && is_file($_file) && is_readable($_file))
        {
            return include $_file;
        }
        else
        {
            throw new \Exception('The config file "<b>' . $name .'</b>" is not existing or it&#39;s unreadable');
        }
    }

    public static function get($config)
    {
        list($file, $var) = explode('.', $config);

        if(!array_key_exists($file, self::$loaded))
        {
            $file_data = self::load($file);
            self::$loaded[$file] = $file_data;
        }

        if (array_key_exists($var, self::$loaded[$file]))
        {
            return self::$loaded[$file][$var];
        }
        return null;
    }
}
