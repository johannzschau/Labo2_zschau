<?php
   
 session_start();

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
			
	case 0 :


	include("controleur.php");
	break;
	case 1 :
	include("manager.php");
$mysqli = new mysqli("localhost", "root", "", "reservation_1")
or die("Could not select database");
if ($mysqli->connect_errno) {
echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
" . $mysqli->connect_error;
}
else 
{
$query = "SELECT * FROM reservation_2";	
$sql = "DELETE FROM reservation_2 WHERE ID =4";

if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $mysqli->error;
}
	break;
}

 

 
 
 
?>