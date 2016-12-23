<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : Detail</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1>Manager</h1>

<?php



 

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
				// sql to delete a record
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
//Editing a User					//
//////////////////////////////////////
		 elseif(isset($_POST['Editer']))
			{
				include_once("reservation_model.php");
				include_once("person_model.php");
				
				$id_T=1;
				$id_T=$_POST['user_id']; // Retrieve ID
				
				echo '<th> modifier 2 </th>';
				// Try and connect to the database
				$query = "SELECT * FROM reservation_2 WHERE ID ='$id_T'"; //MySqli Select Query
				$result2 = $mysqli->query($query);
				$line = $result2->fetch_assoc();
				
				$ID = $line["ID"];
				$Nb_place = 0;
				$reservation = new reservation($line["destination"],$Nb_place,$line["insurance"]);//Open a new connection to the MySQL server 
				$person[] = new person($line["lastname"],$line["age"]); //Open a new connection to the MySQL server
				
				session_start();// Activate the session a second time so as not to lose the session data
				
				$_SESSION['manager']=$ID; // Use for the page "confirmation.php" to determine that it is the manager who makes the update
				$_SESSION['reservation'] = serialize($reservation);
				$_SESSION['person'] = serialize($person);
				header("Location:index.php"); 
				exit;     /* Redirection du navigateur */		/* Redirection du navigateur */

			}
	
//////////////////////
//LINE				//
//////////////////////
	

		// Execute SQL queries
		$query = "SELECT * FROM reservation_2";
		$result = $mysqli->query($query) or die("Query failed ");

		if ($result->num_rows == 0) 
			{
				echo "Aucune ligne trouvée, rien à afficher.";
				exit;
			}
		else
			{
				// Displaying column headers
				echo "<table>\n<tr>";

//////////////////////
//FIELD				//
//////////////////////	

				while ($finfo = $result->fetch_field())
					{ 
						
						echo '<td style="border:1px solid black;">'. $finfo->name .'</td>';
					}
					echo '<th style="border:1px solid black;">Supprimer</th>';
					echo '<th style="border:1px solid black;">Editer</th>';
			
				echo "</tr>\n";


//////////////////////
//DATA				//
//////////////////////


				// Show results
				while ($line = $result->fetch_assoc()) 
					{
						$IDS = $line["ID"];
						echo "\t<tr>\n";
						
						foreach ($line as $col_value)
							{


								echo '<td style="border:1px solid black;">'.$col_value.'</td>';
							}
					
						
					echo '<form method="post" action="manager.php" >
					
					<th><input type="submit" class="button" name="Editer" value="Editer"></th>
					<th><input type="submit" class="button" name="Submit" value="Supprimer"></th>
					<input type="hidden" name="user_id" value= '.$IDS.'>
					</form>';
					
						
					
					
					}
				echo "</table>\n";

			}

// Release of results
$result->close();
// Closing the connection
$mysqli->close();

}

?>
</body>
</html>