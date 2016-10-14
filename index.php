<?php
   
   session_start();
   
   if(isset($_POST['btn_next']))
	{
		$page=$_SESSION['page'];
	}
   else
    {
		$page=null;
    }
	if(isset($_POST['Annuler']))
	{
		$page=null;
	}
	
	 switch ($page)
	{
   
		default:
		include("Reservation.php");
		break ;
		
		case 2 :
			
			if(isset($_POST['destination']) AND $_POST['Nb_place'])
			{
				if(strlen($_POST['destination'])<=15)
				{
					$destination=$_POST['destination'];
				}
				if(intval($_POST['Nb_place']))
				{
					$Nb_placee=$_POST['Nb_place'];
				}
				
				include("Detail.php");
				
							}
		
		break;
				
	}
?>
