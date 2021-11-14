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
		<tr><b>Catégorie</b></tr><br>
		<tr ><input type="text" class="t" name="Catégorie" required></tr><br>
		<p><input type="submit" value="Rechercher" class="boutton"name="rechercher"><input type="reset" class="boutton"value="Annuler"></p>
	</table>
		</fieldset>
		
	</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
	{

if (isset($_POST['rechercher']) )
{
	$categorie=$_POST['Catégorie'];
	//echo 'date : '.$date."\n";
	$sql="SELECT '$categorie',SUM(Prix_HT_DH)FROM liste WHERE `Cat_gories`='$categorie'";
	$sql2="SELECT * FROM liste WHERE `Cat_gories`='$categorie'";
	$run2=mysqli_query($base,$sql2);

	$run=mysqli_query ($base,$sql);
	if(mysqli_num_rows($run2)!=0){
		?><table border="1"><?php
		?>
			<tr >
				<th >Catégorie</th>
				<th >Prix_total</th>
				</tr>
		<?php
		$row=$run->fetch_row()
		?><tr><td class="tb"><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>

		</tr>
		<?php

		?></table><?php
	}
	else{
		echo '<script type="text/javascript"> alert("Catégorie non valide")</script> ';
	}
	mysqli_close($base);
	 
}

}
?>
	
	
	

</body>
</html> 