<?php

/**
 * CorbackGame Answers Model
 */
class ClassName extends Model
{
	
	function __construct(argument)
	{
		$stmt_CA_Table = "CREATE TABLE IF NOT EXISTS CorbackAnswers (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			Session_id INT NOT NULL,
			Answer_id INT NOT NULL,
			Answer BOOLEAN NOT NULL
		)";

		$this->execute($stmt_CA_Table);
	}

	function getStatistics()
	{
		$stmt_statistics = "SELECT SUM(CA.Answer) FROM CorbackAnswers AS CA 
		LEFT OUTER JOIN CorbackGame AS CG ON CG.Answer = CA.Answer";

		return $this->execute($stmt_statistics);
	}

	function getSelfStatistics($Session_id = 0)
	{
		$stmt_self = "SELECT SUM(CA.Answer) FROM CorbackAnswers AS CA 
		LEFT OUTER JOIN CorbackGame AS CG ON CG.Answer = CA.Answer
		WHERE Session_id = ?";

		return $this->execute($stmt_self, [$Session_id]); 
	}

	function showAnswer($Session_id = 0, $number = 0)
	{
		$stmt_answer = "SELECT Answer FROM CorbackAnswers 
		WHERE Session_id = ? AND Answer_id = ?";

		return $this->execute($stmt_answer, [$Session_id, $number]);
	}

	

}