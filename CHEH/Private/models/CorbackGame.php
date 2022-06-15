<?php

/**
 * the model for the CorbackGame
 */
class CorbackGame extends Model
{
	
	function __construct()
	{
		$stmt_CG_Table = "CREATE TABLE IF NOT EXISTS Corbackgame (
			id INT PRIMARY KEY AUTO_INCREMENT,
			Location VARCHAR(256) NOT NULL,
			Name VARCHAR(256) NOT NULL,
			Answer BOOLEAN NOT NULL, 
			Reason VARCHAR(2048) NOT NULL
		)";

		$this->execute($stmt_CG_Table);
	}

	function getQuestion($number = 0)
	{
		$stmt_getQuestion = "SELECT Location,Name FROM CorbackGame WHERE id = ?";
		return $this->execute($stmt_getQuestion, [$number]);
	}

	function getAnswer($number = 0)
	{
		$stmt_getAnswer = "SELECT Answer FROM CorbackGame WHERE id = ?";
		return $this->execute($stmt_getAnswer,[$number]);
	}

	function addQuestion()
	{
		#To do
	}
}