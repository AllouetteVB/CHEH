<?php

/**
 * The model class 
 */
class Model extends Database
{
	
	protected function prepare($query = "")
	{
		$this->stmt = $this->connection->prepare($query);
		$this->prepared = true;
	}

	protected function stopPrepare()
	{
		$this->prepare = false;
	}

	protected function beginTransaction()
	{
		$this->connection->beginTransaction();
	}

	protected function commitTransaction();
	{
		$this->connection->commit();
	}

	protected function execute($query = "", $param = array())
	{
		if($this->prepared)
		{
			$this->stmt->execute($params);
		}
		else
		{
			$this->stmt->prepare($query);
			$this->stmt->execute($params);
		}
	}

}