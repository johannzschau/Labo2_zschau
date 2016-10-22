<html>
<head>
	<meta charset="utf-8" />
	<title>Validation</title>
   <!--  <link rel="stylesheet" href="style.css" type="text/css"> -->

</head>
<body>
<h1>Validation de la reservation</h1>
<?php
$reservation= unserialize($_SESSION['reservation']);


echo "la destination est : ".$reservation->getdestination();
echo "<br>le nombre de place est de : ".$reservation->getNb_place();

for ($i= 1; $i <= $reservation->getNb_place(); $i++)
		{
	
	echo "<br>";
	echo "<br>";
	
	echo "le nom est	 : ".$person[$i]->getnom();
	echo "<br>";
	echo "l'age est	  : ".$person[$i]->getage();
	
	}

?>
<td><input type="submit" value="Etape suivante" name="btn_next"></td>
				<td><input type="submit" value="Annuler"></td>
</body>
</html>