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
for ($i= 0; $i <= $reservation->getNb_place(); $i++)
		{
	
	echo "<br>";
	echo "<br>";
	
	echo "le nom est	 : ".$person[$i]->getnom();
	echo "<br>";
	echo "l'age est	  : ".$person[$i]->getage();
	echo "\n";
	}

?>
<form method='post' action='index.php'>
<p>  
<td><input type="submit" value="Etape suivante" name="btn_next"></td>
<td><input type="submit" value="Retour" name="btn_rtn"></td>
				<td><input type="submit" value="Annuler"></td></p>
</form>	
</body>
</html>