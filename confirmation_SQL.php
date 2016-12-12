<?php
$nom=$person[0]->getnom();
$prenom='guardian';
$destination=$reservation->getdestination();
$ages=$person[0]->getage();

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
{echo"";//Record updatedsuccessfully
$id_insert= $mysqli->insert_id;} 

else
	{
	echo"Error inserting record: " . $mysqli->error;
	}
	

	
}

?>