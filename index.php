<?php
   
   session_start();
   
	include_once("reservation_modele.php");
	include_once("person.php");
	
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
					$Nb_place=$_POST['Nb_place'];
				}
				
				$reservation = new reservation($destination,$Nb_place); 
				$_SESSION['reservation'] = serialize($reservation);
				include("Detail.php");
				 $_SESSION['reservation']=serialize($reservation); 
				  if(isset($_POST['btn_next']))
				{
					$_SESSION['page']=3 ;
				}
				 else
				{
					$_SESSION['page']=null ;
				}
				}
		
		break;
		case 3 :
		
$reservation=unserialize($_SESSION['reservation']);

		for ($i= 1; $i <= $reservation->getNb_place(); $i++)
		{
		if(isset($_POST['nom'.$i]) AND $_POST['age'.$i])
		{
			if(strlen($_POST['nom'.$i])<=15 and intval($_POST['age'.$i]))
				{
					//$nom=$_POST['nom'.$i];
					//$age=$_POST['age'.$i];
					$person[$i] = new person($_POST['nom'.$i],$_POST['age'.$i]); 					
					$_SESSION['person'] = serialize($person[$i]);
				}}}
		include("validation.php");
		
		
		
		break;		
	
}

?>