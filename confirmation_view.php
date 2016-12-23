<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : acceuil</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 
</head>
<body>
<script type="text/javascript"></script>

<h1>Confirmation des reservations</h1>
		
<?php
if (!isset($_SESSION['page']))// If the "page" session does not exist. We modified URL
	{
		echo "Ne pas modifier URL 1 ";
	}



else{
$nB_place=$reservation->getNb_place();//Reconstructs saved objects in session
$nB_place=($nB_place+1);
$insurance =$reservation->getinsurance();//Reconstructs saved objects in session

for ($i= 0; $i <= $reservation->getNb_place(); $i++)
	{
	
		
	$name=$person[$i]->getname();//Reconstructs saved objects in session
	$firstname='';
	$destination=$reservation->getdestination();//Reconstructs saved objects in session
	$ages=$person[$i]->getage();//Reconstructs saved objects in session
	
	$mysqli = new mysqli("localhost", "root", "", "reservation_1")//Open a new connection to the MySQL server
	or die("Could not select database");
	
	/*Checking the connection*/

	if ($mysqli->connect_errno) 
	{
		echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
	}
	
	/* Update of the database by the manager */
	
		elseif (isset($_SESSION['manager']))
	{
		

		$id_T = $_SESSION['manager']; // ID of reservation
				$query = "SELECT * FROM reservation_2"; //MySqli Select Query
				$sql="UPDATE reservation_2 SET lastname='$name',age='$ages',insurance='$insurance',destination='$destination' WHERE ID='$id_T'"; //modif la colonne Personne dans la table personne
				
				if ($mysqli->query($sql) === TRUE)
					{
						echo "uptdating ok";
					}
				else 
					{
						echo "Error uptdating:".$mysqli->error;
					}
	}
	else 
	{
		/* Update of the database by the customer */
		
		$query = "SELECT * FROM reservation_2"; //MySqli Select Query
	    // An insertion query. $result will be `true` if successful
		$sql= "INSERT INTO `reservation_2` (`lastname`, `age`, `insurance`, `destination`,`ID`)	
		VALUES ('$name', '$ages','$insurance','$destination',NULL);";/* Insertion d'un enregistrement$*/
		if ($mysqli->query($sql) === TRUE) 
			{
				echo"<p>
				Votre demande a bien été enregistrée.<br>
				Merci de bien vouloir verser la somme de 45€ <br>
				sur le compte 000-000000-00
				</p>";
				$id_insert= $mysqli->insert_id;
			} 
		/*Output any connection error*/
		else
			{
				echo"Error inserting record: " . $mysqli->error;
			}
	}

// Closing the connection
$mysqli->close();


}
}
?>		
		
		
<form method="post" action="index.php">
<table> 


<tr>
<td><input type="submit" class="button"value="retour a la page d'accuil" name="btn_cancel"></td>
</tr>
</table> 
		 
</form>
</body>
</html>