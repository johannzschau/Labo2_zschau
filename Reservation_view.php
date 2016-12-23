<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : acceuil</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 

</head>
<body>
<script type="text/javascript">
</script>

<h1>Reservation</h1>
		<p>
            Le prix de la place est de
            10€ jusqu'a 12 ans ensuite de 15€.<br>
            Le prix est de l'assurancence annulation
            est de 20€ que que soit le nombre de voyageurs.
        </p>

<?php 

if(!empty($reservation))//If a sesion exists, the objects are rebuilt here
	{
		$destination = $reservation->getdestination();
		$Nb_place = ($reservation->getNb_place()+1);
	}
$txt1 = $_SESSION['error_AL'];
echo "<h2>$txt1</h2>";//If an error is detected, it is displayed here.

?>
<form method="post" action="index.php">
	<table> 

		<tr><td>Destination</td> 
		<td><input type="text" name="destination" placeholder="Ex : Paris" size="30" maxlength="10" value ="<?php if(!empty($destination)){echo $destination;} else {echo"";};?>"/><br />
		</tr>
		<tr><td>Nombre de place</td> 
		<td><input type="text" name="Nb_place" 	  placeholder="Ex : 1,2,3" size="30" maxlength="10" value ="<?php if(!empty($Nb_place)){echo $Nb_place;} else {echo"";};?>"/><br />
		</tr>
		<tr><td>Assurance annulation</td> 
		<td><input type="checkbox" name="insurance" value= "1" /></td>
		</tr>	 
		<tr>
		<td><input type="submit" class="button" value="Etape suivante" name="btn_next" ></td>
		<td><input type="submit" class="button"value="annuler" 		name="btn_cancel"></td>
		</tr>
	</table> 
</form>
</body>
</html>