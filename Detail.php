<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : Detail</title>
   <!--  <link rel="stylesheet" href="style.css" type="text/css"> -->

</head>
<body>
<h1>Detail de la reservation</h1>
 <?php
				

 //$_SESSION['reservation']=serialize($reservation); 
$reservation= unserialize($_SESSION['reservation']);

echo "<form method='post' action='index.php'>";

for ($i= 1; $i <= $reservation->getNb_place(); $i++)
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
?>   
				<td><input type="submit" value="Etape suivante" name="btn_next"></td>
				<td><input type="submit" value="Annuler"></td>
				
	 

 	
</body>
</html>