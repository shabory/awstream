<?php 
session_start();


/**
* 
*/
class auth 
{
	
	var $user_name ;
	var $password ;


	function check ()
	{

		
		if((isset($_SESSION['authenticated']) && $_SESSION['authenticated'])||isset($_COOKIE['remember_me']))
		{
			return true ; 
		}
		else
		{
			return false ;
		}
	}

	function get_user ($user_name,$password,$db)
	{


	   $req = $db->query("SELECT username,password FROM users where username='$user_name'
	   and password=MD5('$password') ");

	   if ($req->rowCount() > 0)
	   {
	   	 return $_SESSION['authenticated']=true ;

	   }
	   else
	   {
	   	return $_SESSION['authenticated']=false ;
	   }





	}

	function logout()
	{
	  setcookie("remember_me"," ",time()-1);
      return $_SESSION['authenticated']=false ;

	}




}




?>