<?php


/**
 * Database class to connect to the database.
 */
class Database
{
	protected $connection = null;

	protected $stmt = null;
	protected $prepared = false;

	function __construct($DBMS = "mysql", $ServorName = "localhost",
	$Username = "username", $Password = "", $DBname = "CHEH")
	{
		try 
		{
			$this->connection =
			new PDO("$DBMS:host=$ServorName;dbname=$DBname",
			$Username, $Password);
		}
		catch (PDOException $e) 
		{	
			if($e->getCode() == 1049)
			{
				$this->connection = 
				new PDO("$DBMS:host=$ServorName",
				$Username,$Password);

				$stmt_create_db = "CREATE DATABASE IF NOT EXISTS $DBname";
				$this->connection->query($stmt_create_db);

				$this->connection = null;
				$this->connection =
				new PDO("$DBMS:host=$ServorName;dbname=$DBname",
				$Username, $Password);
			}
			else
			{
				echo $e->getMessage();
			}
		}
		
	
	}
}

$database = new Database();