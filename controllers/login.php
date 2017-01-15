<?php
if(isset($_POST['logout']))
{
	auth::logout();
  
	require_once('views/login.php');
}

if(isset($_POST['login']))
  {
  	$passport=auth::get_user($_POST['user'],$_POST['password'],$db);
  	if($passport)
  	{
      if(isset($_POST['remember']))
      {
        $year = time() + 31536000;
        setcookie('remember_me', $_POST['user'], $year);
      }

  		require_once('views/home.php');

  	}
  	else
  	{
  		$login_message="wrong user name or password";
  		require_once('views/login.php');
  	}

  }
  else
  {
  	require_once('views/login.php');
  }






?>