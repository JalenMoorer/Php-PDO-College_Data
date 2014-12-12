<?php
	
	require_once('Autoloader.php');
	spl_autoload_register('Autoloader::autoload');

	$page = 'home';	
	$Arg = NULL;

	if(isset($_REQUEST['page']))
	{
			$page = $_REQUEST['page']; 
				
	}

	if(isset($_REQUEST['Arg']))
	{
			$Arg = $_REQUEST['Arg'];
				
	}

	$class = "Classes\pages\\$page";
	$page = new $class($Arg, $connection);

?>