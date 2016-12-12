<html>
<head>
	<meta charset="utf-8" />
	<title>Validation</title>
  <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
<h1>Validation de la reservation</h1>
<?php

$nB_place=$reservation->getNb_place();
$nB_place=($nB_place+1);
echo "la destination est : ".$reservation->getdestination();
echo "<br>le nombre de place est de : ".$nB_place;
echo "<br>Assurance : ".$reservation->getassurance();
// Insertion d'un enregistrement




for ($i= 0; $i <= $reservation->getNb_place(); $i++)
		{
	
	echo "<br>";
	echo "<br>";
	
	echo "le nom est	 : ".$person[$i]->getnom();
	echo "<br>";
	echo "l'age est	  : ".$person[$i]->getage();
	echo "\n"; 
	
	
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
{echo"\nRecord updatedsuccessfully";
$id_insert= $mysqli->insert_id;} 

else
{
	echo"Error inserting record: " . $mysqli->error;
	}
	

	
}	
	
	
	
	
	
	
	}

?>

<form method='post' action='index.php'>
<p>  
<td><input type="submit" class="button"value="Confirmation" name="btn_next"></td>
<td><input type="submit" class="button"value="Retour" name="btn_rtn"></td>
<td><input type="submit" class="button"value="annuler" 		name="btn_Annuler"></td></p>
</form>	
</body>

</html>