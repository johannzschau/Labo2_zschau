<?php
   
session_start();
var_dump($_SESSION);
if(!empty($_GET['admin']))
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