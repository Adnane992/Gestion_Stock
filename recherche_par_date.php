 <!DOCTYPE html>

<?php

$base = mysqli_connect ("localhost","root","","liste","3306");


if (!$base) {
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Succès : Une connexion correcte à MySQL a été faite! La base de donnée my_db est géniale." . PHP_EOL;

?>

<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="cadre.css">
	
	
</head>
<body class="acceuil">
	<form  class="leg" method="POST" >
		<fieldset>
			<legend ><b>Nouveau Matériel</b> </legend>
	<table>
		<tr><b>Entrer votre année de recherche</b></tr><br>
		<tr ><input type="number" class="t" name="date"></tr><br>
		<p><input type="submit" class="boutton" value="Rechercher" name="rechercher"><input type="reset" class="boutton"  value="Annuler"></p>
	</table>
		</fieldset>
		
	</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
	{

if (isset($_POST['rechercher']) )
{
	$date=$_POST['date'];
	//echo 'date : '.$date."\n";
	$sql="SELECT * FROM liste WHERE year(`Date_d_acquisition`)='$date%'";
	$run=mysqli_query ($base,$sql);
	if(mysqli_num_rows($run)!=0){
		?><table border="1"><?php
		?>
			<tr>
				<th>Numero d'ordre</th>
				<th>Departement</th>
				<th>Catégorie</th>
				<th>Designation</th>
				<th>Fournisseur</th>
				<th>Prix_HT</th>
				<th>Date</th>
			</tr>
		<?php
		while($row=$run->fetch_row()){
			?><tr><td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
			<td><?php echo $row[2] ?></td>
			<td><?php echo $row[3] ?></td>
			<td><?php echo $row[4] ?></td>
			<td><?php echo $row[5] ?></td>
			<td><?php echo $row[6] ?></td></tr>
			<?php

		}
		?></table><?php
	}
	else{
		echo '<script type="text/javascript"> alert("Année non retrouvée")</script> ';
	}
	mysqli_close($base);
	 
}

}
?>
	
	
	

</body>
</html>