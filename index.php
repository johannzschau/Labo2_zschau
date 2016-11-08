<?php
   
 session_start();
 
 include("reservation_model.php");
 include("person_model.php");
 include("error_model.php");

 $page = control_variables();
 $_SESSION['error_AL']= "";

 switch ($page)
{
	default:

		$reservation= read_reservation();
		include("Reservation_view.php");
		$_SESSION['page']=1;
								
	break ;
		
	case 1 :
		
		$person= read_detail();
		$reservation= save_reservation ();
		if ($reservation==false)
		{
			include("Reservation_view.php");
			$_SESSION['page']= 1;
		}
		else 
		{
					
			include("Detail_view.php");
			$_SESSION['page']= 2 ;
		}
	break;
		
	case 2 :
		$reservation= read_reservation();
		$person = save_detail ();
			
		if ($person==false)
		{
			include("Detail_view.php");
			$_SESSION['page']= 2 ;
		}
		else
		{
			include("validation_view.php");
			$_SESSION['page']= 3;
		}
	break;
	
	case 3 :
	include("confirmation_view.php");
	break;	
	
}
function control_var ($reservation)
{
	if ($reservation == false)
	{
		return null;
	}
				
	else 
	{
		return 1;
	}
		   
}



function save_detail ()
{
	$res = read_reservation();
	$person = array();
	for ($i= 0; $i <= $res->getNb_place(); $i++)
	{
		if(isset($_POST['nom'.$i]) && isset($_POST['age'.$i]))
		{
			if(strlen($_POST['nom'.$i])<=15 and intval($_POST['age'.$i])>0 and intval($_POST['age'.$i])< 110 )
			{
				$nom=$_POST['nom'.$i];
				$age=$_POST['age'.$i];
				$person[] = new person($nom,$age); 					
					
			}
			else 
			{
				$_SESSION['error_AL']= "!!!!!!! champs incorrecte !!!!!!.\n";
				return false;
			}
				
		}
		else
		{
			for ($i= 0; $i <= $res->getNb_place(); $i++)
			{
				$person[] = new person('erreur',0);}
				$_SESSION['error_AL']="Veuillez remplir tous les champs correctement.\n";
				return false;
			}
					
	    }
	$_SESSION['person'] = serialize($person);	
	return  $person;
}

function save_reservation ()
{	
	if(isset($_POST['destination']) && isset ($_POST['Nb_place']))
	{
		if(strlen($_POST['destination'])<=15 && strlen($_POST['destination'])>2 && intval($_POST['Nb_place'])<=15 && intval($_POST['Nb_place'])>0 )
		{
			if (empty($_POST['assurance'])) 
			{ 
                $assurance = 'non';
            }
			else
			{
				$assurance = 'oui';
			}
		$destination=$_POST['destination'];
		$Nb_place=($_POST['Nb_place']-1);
		$reservation = new reservation($destination,$Nb_place,$assurance); 
		$_SESSION['reservation'] = serialize($reservation);
		return $reservation;
		}
		else 
		{
			$_SESSION['error_AL']= "!!!!!!! champs incorrecte !!!!!!.\n";
			$reservation = new reservation("","",""); 
			$_SESSION['reservation'] = serialize($reservation);
			return false;
					
		}
    }
	elseif(isset ($_SESSION['reservation'])){return read_reservation(); }
	else 
	{
		$_SESSION['error_AL']= "!!!!!!! champs incorrecte !!!!!!.\n";
		$reservation = new reservation("","",""); 
		$_SESSION['reservation'] = serialize($reservation);
		return false;
	}
}
	

function read_reservation()
{
	if (isset($_SESSION['reservation']))
	{
		return unserialize($_SESSION['reservation']);
	} 
	else
	{
		return new Reservation('','',1);
	}
}

function read_detail()
{
	if (isset($_SESSION['person'])) 
	{
		return unserialize($_SESSION['person']);
	}	
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
			$person[] = new person($nom,$age);
		}	
	}
		
	return $person;
		
	}
}

function read_error()
{
	if (isset($_SESSION['error'])) 
	{
		return unserialize($_SESSION['error']);
	}	
	else
	{
		$error = false;
		$Error = new error ($error);
		return $Error;
	}	
		
}
		
	
		
	


function control_variables()
{  
	if(isset($_POST['btn_next']))
	{ 			
	 	$page=$_SESSION['page'];
	}

		
	
   elseif(isset($_POST['btn_rtn']))
	{
		$temps=$_SESSION['page'];
		$page = ($temps-2);
	}
	elseif(isset($_POST['btn_Annuler']))
    {
		$page=null;
		$_SESSION = array();
		
	}
	
	else
	{
		$page = null;
	}
		return $page;
}


?>