<html>
<head>
	<meta charset="utf-8" />
	<title>Reservation : Detail</title>
<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
<h1>Detail de la reservation</h1>

<?php

if (!isset($_SESSION['page']))
	{
		echo "Ne pas modifier URL 1";
	}
else
	{
		
$txt1 = $_SESSION['error_AL'];
echo "<h2>$txt1</h2>";
echo "<form method='post' action='index.php'>";

for ($i= 0; $i <= $reservation->getNb_place(); ++$i)
	{
		if(!empty($person[$i]))
			{
				$name = $person[$i]->getname();
				$age = $person[$i]->getage();
			}
		else
			{
				$name = "";
				$age  = "";
			}
		echo'<table>
			<tr>
				<td>Nom:</td> 
				<td><input type="text" name="name'.$i.'" value ='.$name.'></td>
			</tr>
			<tr>
				<td>Age:</td>
				<td><input type="text" name="age'.$i.'"value ='.$age.'></td>
			</tr>
		</table>';
	}
		echo '  <td><input type="submit" class="button"value="Etape suivante" name="btn_next"></td>
				<td><input type="submit" class="button"value="Retour" name="btn_rtn"></td>
				<td><input type="submit" class="button" value="annuler" name="btn_cancel"></td>';
  
	 
	}
?>   
				
 
</form>				
	 
</body>
</html>