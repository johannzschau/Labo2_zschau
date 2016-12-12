<?php

$mysqli = new mysqli("localhost", "root", "", "reservation_1")
or die("Could not select database");
if ($mysqli->connect_errno) {
echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
" . $mysqli->connect_error;
}
else 
{

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
echo "\t<tr>\n";
foreach ($line as $col_value) {

echo "\t\t<td>$col_value</td>\n";
}
echo '<form method="post" action="manager.php" >
<input type="hidden" name="user_id" value= <?php echo $id; ?> >
<th><input type="submit" name="Submit" value="Supprimer"></th>
<th><input type="submit" name="Submit" value="Editer"></th>

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