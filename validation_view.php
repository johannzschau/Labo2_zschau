<html>
<head>
	<meta charset="utf-8" />
	<title>Validation</title>
<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
<h1>Validation de la reservation</h1>

<?php
if (!isset($_SESSION['page']))// If the "page" session does not exist. We modified URL
	{
		echo "Ne pas modifier URL ";
	}

else
	{

$nB_place=$reservation->getNb_place();//Reconstructs saved objects in session
$nB_place=($nB_place+1);
echo "la destination est : ".$reservation->getdestination();//Reconstructs saved objects in session to display them 
echo "<br>le nombre de place est de : ".$nB_place;
echo "<br>Assurance : ".$reservation->getinsurance();//Reconstructs saved objects in session to display them 

for ($i= 0; $i <= $reservation->getNb_place(); $i++)//"Loop for" to display all the names and ages of people
	{
	
		echo "<br>";
		echo "<br>";
		echo "le nom est	 : ".$person[$i]->getname();
		echo "<br>";
		echo "l'age est	  : ".$person[$i]->getage();
		echo "\n"; 
	
	}	
	
	
echo "<form method='post' action='index.php'>
	<p>  
	<td><input type='submit' class='button'value='Confirmation' name='btn_next'></td>
	<td><input type='submit' class='button'value='Retour' name='btn_rtn'></td>
	<td><input type='submit' class='button'value='annuler' 		name='btn_cancel'></td></p>
</form>";
	
}
?>

</html>