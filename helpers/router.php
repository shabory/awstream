<?php
if(auth::check())
{
 if(isset($_POST['logout']))
	{
		require_once('controllers/login.php');
	}
	else
	{
		require_once('views/home.php');

	}	
	
}
else
{

	require_once('controllers/login.php');
}

?>