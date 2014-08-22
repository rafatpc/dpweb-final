<?php
define('CONFIG_F', 'config' . DIRECTORY_SEPARATOR);

class Config {

    private $_config = array();
	
    public function load($name)
	{
        if(!empty($name))
		{
			$_file = realpath(CONFIG_F . $name . '.php');
			
			if ($_file != FALSE && is_file($_file) && is_readable($_file))
			{
				$_basename = explode('.php', basename($_file));
				$this->_config[$_basename[0]] = include $_file;            
			}
			else
			{
				throw new Exception('The config file "<b>' . $name .'</b>" is not existing or it&#39;s unreadable');
			}
		}
		else
		{
			throw new Exception('The config file name is empty.');
		}
	}

	public function __get($name)
	{
		if(!in_array($name, $this->_config))
		{
			$this->load($name);
		}
		if (array_key_exists($name, $this->_config))
		{            
			return $this->_config[$name];
		}
		return null;
	}
}
