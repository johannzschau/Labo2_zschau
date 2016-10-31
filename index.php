<?php
   
   session_start();
   
	include_once("reservation_model.php");
	include_once("person_model.php");
	
   if(isset($_POST['btn_next']))
	{
		$page=$_SESSION['page'];
	}
   elseif(isset($_POST['btn_rtn']))
	{
		$temps=$_SESSION['page'];
		$page = ($temps-2);
	}
		else 
    {
		$page=null;
		$_SESSION = array();
    }
	
	 switch ($page)
	{
   
		default:
				$reservation= read_reservation();
				include("Reservation_view.php");
				$_SESSION['page']= 1 ;
					
		break ;
		
		case 1 :
				$reservation= read_reservation();
				$person= read_detail();
				$reservation= save_reservation ();
				include("Detail_view.php");
				$_SESSION['page']= 2 ;
		break;
		
		case 2 :
				$reservation= read_reservation();
				$person = save_detail ();
				include("validation_view.php");
				$_SESSION['page']= 3;
		break;		
	
}
function save_detail ()
{
	$res = read_reservation();
	$person = array();
		for ($i= 0; $i <= $res->getNb_place(); $i++)
		{
		if(isset($_POST['nom'.$i]) && isset($_POST['age'.$i]))
		{
			if(strlen($_POST['nom'.$i])<=15 and intval($_POST['age'.$i])>0)
				{
					$nom=$_POST['nom'.$i];
					$age=$_POST['age'.$i];
					$person[] = new person($nom,$age); 					
					
				}}
				else{
					for ($i= 0; $i <= $res->getNb_place(); $i++)
					
					{$person[] = new person('erreur',0);}
					}
					
	     }
		$_SESSION['person'] = serialize($person);	
		return  $person;
		
		}

function save_reservation ()

{	


	if(isset($_POST['destination']) && isset ($_POST['Nb_place']))
			{
				//strlen : Calculates the size of a string
				if(strlen($_POST['destination'])<=15 && intval($_POST['Nb_place'])>0&&intval($_POST['Nb_place'])<=15 )
				{
				if (empty($_POST['assurance'])) { 
                $assurance = 'non';
                }
				else
				{$assurance = 'oui';}
					$destination=$_POST['destination'];
					$Nb_place=($_POST['Nb_place']-1);
					
					$reservation = new reservation($destination,$Nb_place,$assurance); 
					
				}
				else
				{
					$reservation = new reservation("","",""); 
				}
				$_SESSION['reservation'] = serialize($reservation);
				
				return $reservation;
			}
			elseif(isset ($_SESSION['reservation'])){return read_reservation(); }
			
		
			}
	
	
function read_reservation()
{
if (isset($_SESSION['reservation'])) {
return unserialize($_SESSION['reservation']);
} else {
return new Reservation('','',1);
}
}

function read_detail()
{
if (isset($_SESSION['person'])) 
{return unserialize($_SESSION['person']);}	
	else
	{
	$person = array();
	$res = read_reservation();
	if ($res->getNb_place()>0)
	{
	for ($i= 0; $i <= $res->getNb_place(); $i++)
	{
		$nom='';
		$age=0;
		$person[] = new person($nom,$age);}	
		
	}
		
	return $person;
		
	}

}



?>