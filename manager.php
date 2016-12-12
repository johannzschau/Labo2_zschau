<?php

$mysqli = new mysqli("localhost", "root", "", "reservation_1")
or die("Could not select database");
if ($mysqli->connect_errno) {
echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
" . $mysqli->connect_error;
}
else 
{
	if(isset($_POST['Submit']))
	{ 
$id_T=1;
$id_T=$_POST['user_id'];
echo '<th> supprimer </th>';

$query = "SELECT * FROM reservation_2";	
$sql = "DELETE FROM reservation_2 WHERE ID ='$id_T'";

if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $mysqli->error;
}

	}
// Exécuter des requêtes SQL
$query = "SELECT * FROM reservation_2";
$result = $mysqli->query($query) or die("Query failed ");


if ($result->num_rows == 0) {
echo "Aucune ligne trouvée, rien à afficher.";
exit;
}
else
{

	// Affichage des entêtes de colonnes
echo "<table>\n<tr>";





while ($finfo = $result->fetch_field())
{ echo '<th>'. $finfo->name .'</th>'; }
echo '<th> Supprimer </th>';
echo '<th> Editer </th>';
echo "</tr>\n";






// Afficher des résultats en HTML
while ($line = $result->fetch_assoc()) {
	$IDS = $line["ID"];
echo "\t<tr>\n";
foreach ($line as $col_value) {

echo "\t\t<td>$col_value</td>\n";
}
echo '<form method="post" action="manager.php" >
<input type="hidden" name="user_id" value= '.$IDS.'>
<th><input type="submit" name="Submit" value="Supprimer_'.$IDS.'"></th>
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