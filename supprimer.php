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
	<form  class="leg" method="post" >
		<fieldset>
			<legend ><b>Nouveau Matériel</b> </legend>
	<table>
		<tr><b>Numero d'ordre:</b></tr><br>
		<tr ><input type="text" class="t" name="numero"></tr><br>
		<p><input type="submit" value="Supprimer" class="boutton" name="supprimer"><input type="reset" class="boutton"value="Annuler"></p>
	</table>
		</fieldset>
		
	</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
	{

if (isset($_POST['supprimer']) )
{
	$sql="DELETE FROM liste WHERE `N_d_ordre`='".$_POST['numero']."'";
	$run=mysqli_query ($base,$sql);
	mysqli_close($base);
	 
}
if($run)
{
	echo '<script type="text/javascript"> alert("Deleted")</script> ';
}
else
{	
	echo '<script type="text/javascript"> alert("not deleted")</script> ';
}
}
?>
	
	
	

</body>
</html>