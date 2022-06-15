<?php

/**
 * Corback Game Controller
 */
class Corback extends Controller
{
	private $model_CG;
	private $model_CA;

	private $session_id;
	private $number;

	function __construct()
	{
		$this->model_CG = $this->load_model("CorbackGame");
		$this->model_CA = $this->load_model("CorbackAnswer");
	}

	public function game($session_id = 0,$number = 0)
	{	
		$this->session_id = $Session_id;
		$this->number = $number;

		$this->view('corbackgame');
	}

	


}	