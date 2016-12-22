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
if (!isset($_SESSION['page']))
	{
		echo "Ne pas modifier URL 1 ";
	}



else{
$nB_place=$reservation->getNb_place();
$nB_place=($nB_place+1);
$insurance =$reservation->getinsurance();

for ($i= 0; $i <= $reservation->getNb_place(); $i++)
	{
	
		
	$name=$person[$i]->getname();
	$firstname='';
	$destination=$reservation->getdestination();
	$ages=$person[$i]->getage();
	
	$mysqli = new mysqli("localhost", "root", "", "reservation_1")
	or die("Could not select database");
	if ($mysqli->connect_errno) 
	{
		echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
	}
	
		elseif (isset($_SESSION['manager']))
	{

		$id_T = $_SESSION['manager'];
				$query = "SELECT * FROM reservation_2";
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
		$query = "SELECT * FROM reservation_2";
		// Insertion d'un enregistrement 
		$sql= "INSERT INTO `reservation_2` (`lastname`, `age`, `insurance`, `destination`,`ID`)
		VALUES ('$name', '$ages','$insurance','$destination',NULL);";
		if ($mysqli->query($sql) === TRUE) 
			{
				echo"<p>
				Votre demande a bien été enregistrée.<br>
				Merci de bien vouloir verser la somme de 45€ <br>
				sur le compte 000-000000-00
				</p>";
				$id_insert= $mysqli->insert_id;
			} 

		else
			{
				echo"Error inserting record: " . $mysqli->error;
			}
	}


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