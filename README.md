# Labo2_zschau
rapport PHP labo 2.

<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : acceuil</title>
   <!--  <link rel="stylesheet" href="style.css" type="text/css"> -->

</head>
<body>
<h1>Reservation</h1>
    <p>
            Le prix de la place est de
            10€ jusqu'a 12 ans ensuite de 15€.<br>
            Le prix est de l'assurancence annulation
            est de 20€ que que soit le nombre de voyageurs.
        </p>


<form method="post" action="index.php">
    <p>
       <label for="destination">Destination</label> : <input type="text" name="destination"  placeholder="Ex : Paris" size="30" maxlength="10" /><br />
   </p>
    <p>
       <label for="Nb_place">Nombre de place</label> : <input type="text" name="Nb_place"  placeholder="Ex : 1,2,3" size="30" maxlength="10"/><br />
   </p>
   
      <label for="assurance">Assurance annulation</label> : <input type="checkbox" name="assurance" id="assurance" /> <br />
		 </p>
		 <tr>
					<td><input type="submit" value="Etape suivante" name="btn_next"></td>
					<td><input type="submit" value="Annuler"></td>
				</tr>
		 <?php
								$_SESSION['page']= 2 ;
			?>
		</form>
</body>
</html>
