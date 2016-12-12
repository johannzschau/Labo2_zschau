<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : acceuil</title>
  <link rel="stylesheet" href="style.css" type="text/css"> 

</head>
<body>
<script type="text/javascript">
</script>
<h1>Confirmation des reservations</h1>
		

		
<?php

$nB_place=$reservation->getNb_place();
$nB_place=($nB_place+1);

// Insertion d'un enregistrement




for ($i= 0; $i <= $reservation->getNb_place(); $i++)
		{
	
		
$nom=$person[$i]->getnom();
$prenom='guardian';
$destination=$reservation->getdestination();
$ages=$person[$i]->getage();

$mysqli = new mysqli("localhost", "root", "", "reservation_1")
or die("Could not select database");
if ($mysqli->connect_errno) {
echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
" . $mysqli->connect_error;
}
else 
{
$query = "SELECT * FROM reservation";
	// Insertion d'un enregistrement
$sql= "INSERT INTO `reservation` (`Nom`, `prenom`, `destination`, `age`)
VALUES ('$nom', '$prenom', '$destination', '$ages');";
if ($mysqli->query($sql) === TRUE) 
{echo"<p>
            Votre demande a bien été enregistrée.<br>
            Merci de bien vouloir verser la somme de 45€ <br>
			sur le compte 000-000000-00
        </p>";
$id_insert= $mysqli->insert_id;} 

else
{
	echo"Error inserting record: " . $mysqli->error;
	}
	

	
}	
	
	
	
	
	
	
	}

?>		
		
		
		
		
		
		
<form method="post" action="index.php">
<table> 


<tr>
<td><input type="submit" class="button"value="retour a la page d'accuil" name="btn_Annuler"></td>
</tr>
</table> 
		 
</form>
</body>
</html>