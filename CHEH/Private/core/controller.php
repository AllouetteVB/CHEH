<?php

/**
 * MotherClass of every Controllers
 */

class ClassName extends AnotherClass
{
	
	function __construct()
	{
		// code...
	}

	public function view($view, $data = array())
	{
		extract($data);

		if(file_exists(PRIVATE_VIEWS.$view.".view.php"))
		{
			require(PRIVATE_VIEWS.$view.".view.php");
		}
		else
		{
			require(PRIVATE_VIEWS.'404.view.php');
		}
	}
	
	protected function load_model($model)
	{
		if(file_exists(PRIVATE_MODELS.ucfirst($model).".php"))
		{
			require (PRIVATE.ucfirst($model).".php");
			return $model = new $model();
		}

		return null;
	}	
}
