<?php
namespace Classes\db;



abstract class DBconnect
{
	public $dbh;
	public $sth;

	public $host = 'sql1.njit.edu';
	public $database = 'jmm77';
	public $user = 'jmm77'; 
	public $pass = 'diverse7';

	public function __construct()
	{
		$this->connect();

	}

	public function connect()
	{	
		try 
		{
			$this->dbh = new \PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->pass, array(\PDO::ATTR_TIMEOUT => "5", \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
			return $this->dbh;
		}

		catch (PDOException $e)
		{
			print "Error!: " . $e->getMessage();
			die();
		}
	}
}
