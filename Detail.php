<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : Detail</title>
   <!--  <link rel="stylesheet" href="style.css" type="text/css"> -->

</head>
<body>
<h1>Detail de la reservation</h1>
 <?php
				$_SESSION['page']=3;

 

echo "<form method='post' action='traitement.php'>";
for ($i= 1; $i <= $_POST['Nb_place']; $i++)
{
    
echo'<table>
			<tr>
				<td>Nom:</td> 
				<td><input type="text" name="nom'.$i.'"></td>
			</tr>
			<tr>
				<td>Age:</td>
				<td><input type="text" name="age'.$i.'"></td>
			</tr>
		</table>';
  
} 
   
				echo"	<td><input type='submit' value='Etape suivante' name='btn_next'></td>";
				echo"	<td><input type='submit' value='Retour à la page précente' name='btn_next'></td>";
				echo"	<td><input type='submit' value='Annuler réservation'></td>";
				
		 
?>
 	
</body>
</html>
