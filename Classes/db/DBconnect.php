<?php

abstract class DBconnect
{
	public $dbh;

	public function connect()
	{
		try 
		{
			$dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);

		}
		catch (PDOException $e)
		{
			print "Error!: " . $e->getMessage();
			die();
		}
	}

}
