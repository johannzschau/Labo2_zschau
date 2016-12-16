<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : Detail</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1>Manager</h1>

<?php
 include("reservation_model.php");
 include("person_model.php");

 

///////////////////////
//INIT mysqli		//
//////////////////////

$mysqli = new mysqli("localhost", "root", "", "reservation_1")
or die("Could not select database");

if ($mysqli->connect_errno) 
	{
		echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
		" . $mysqli->connect_error;
	}
else 
	{
///////////////////////
//DELETE LINE		//
//////////////////////
		if(isset($_POST['Submit']))
			{ 
				$id_T=1;
				$id_T=$_POST['user_id'];
				echo '<th> supprimer </th>';

				$query = "SELECT * FROM reservation_2";	
				$sql = "DELETE FROM reservation_2 WHERE ID ='$id_T'";

				if ($mysqli->query($sql) === TRUE) 
					{
						echo "Record deleted successfully";
					}
				else
					{
						echo "Error deleting record: " . $mysqli->error;
					}
			}
///////////////////////////////////////
//Modification d'un utilisateur		//
//////////////////////////////////////
		elseif(isset($_POST['Editer']))
			{   		
				$id_T=1;
				$id_T=$_POST['user_id'];
				echo '<th> modifier 2 </th>';
				
				$query = "SELECT * FROM reservation_2 WHERE ID ='$id_T'";
				$result2 = $mysqli->query($query);
				
			$line = $result2->fetch_assoc();
			
			 $lastname = $line["lastname"];
			 $age = $line["age"];
			 $insurance = $line["insurance"];
			 $destination = $line["destination"];
			 $ID = $line["ID"];
			 $Nb_place = 1;
			 
			 $reservation = new reservation($destination,$Nb_place,$insurance); 
		     $_SESSION['reservation'] = serialize($reservation);
			 $person[] = new person($lastname,$age); 
			 $_SESSION['person'] = serialize($person);
			var_dump($_SESSION);
			//header("Location: http://localhost/projet2.1AC/index.php"); /* Redirection du navigateur */
/* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
exit;

		 
         		 
			
				 /*
				$firstname='dadadadadada';
				$id_T=1;
				$id_T=$_POST['user_id'];
				echo '<th> Editer </th>';
				//Mise à jour d'un enregistrement
				$sql="UPDATE reservation_2 SET lastname='blalalala' WHERE ID='$id_T'"; //modif la colonne Personne dans la table personne
				if ($mysqli->query($sql) === TRUE)
					{
						echo "uptdating ok";
					}
				else 
					{
						echo "Error uptdating:".$mysqli->error;
					}*/
 
			}
	
//////////////////////
//LINE				//
//////////////////////
	

		// Exécuter des requêtes SQL
		$query = "SELECT * FROM reservation_2";
		$result = $mysqli->query($query) or die("Query failed ");

		if ($result->num_rows == 0) 
			{
				echo "Aucune ligne trouvée, rien à afficher.";
				exit;
			}
		else
			{
				// Affichage des entêtes de colonnes
				echo "<table>\n<tr>";

//////////////////////
//FIELD				//
//////////////////////	

				while ($finfo = $result->fetch_field())
					{ 
						echo '<th>'. $finfo->name .'</th>'; 
					}
					
				echo '<th> Supprimer </th>';
				echo '<th> Editer </th>';
				echo "</tr>\n";


//////////////////////
//DATA				//
//////////////////////


				// Afficher des résultats en HTML
				while ($line = $result->fetch_assoc()) 
					{
						$IDS = $line["ID"];
						echo "\t<tr>\n";
						
						foreach ($line as $col_value)
							{

								echo "\t\t<td>$col_value</td>\n";
							}
							
					echo '<form method="post" action="manager.php" >
					
					<th><input type="submit" name="Editer" value="Editer"></th>
					<th><input type="submit" name="Submit" value="Supprimer_'.$IDS.'"></th>
					<input type="hidden" name="user_id" value= '.$IDS.'>
					</form>';
					echo'<form method="post" action="controleur.php" >
					<input type="hidden" name="user_id" value= '.$IDS.'>
					<th><input type="submit" name="Editer" value="Editer"></th>
					</form>';
					echo "\t</tr>\n";
					}
				echo "</table>\n";

			}

// Libération des résultats
$result->close();
// Fermeture de la connexion
$mysqli->close();

}

?>
</body>
</html>