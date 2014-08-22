<?php
// define('VIEWS_F', 'views' . DIRECTORY_SEPARATOR);

class View {
	
	private $views_folder = 'views' . DIRECTORY_SEPARATOR;

	/**
	* 
	* used to load views
	*
	* template can be changed in the view folder header.php and footer.php
	*
	* @param string $name
	* @param array $data
	* @param boolean $template
	* @action include/require the view file
	*/
	
	public static function render($name, $data = array(), $template = TRUE)
	{
		$file_path = $this->views_folder . $name . '.php';
		if(file_exists($file_path))
		{
			if(is_array($data))
			{
				extract($data, EXTR_PREFIX_SAME, "row");
			}
			else
			{
                		throw new Exception('Invalid DATA type: ' . gettype($data));  
			}
			
			if($template === FALSE)
			{
				require $file_path;
			}
			else
			{
				require $this->views_folder . 'template'. DS .'header.php';
				require $file_path;
				require $this->views_folder . 'template'. DS .'footer.php';
			}
		}
		else
		{
			throw new Exception('The file <b>' . $file_path . '</b> doesn&#39;t exists.');
		}
	}
}
