<?php
session_start();
   

if(!empty($_GET['admin']))//If you type "admin" in the url go to the administrator page
	{ 			
	 	$pages= 1 ;
	}
	
else
	{
		$pages = 0;
	}
		
switch ($pages)
	{
			
	case 0 :include("controleur.php");break;
	case 1 :include("manager.php");	  break;
	
	}
  
?>