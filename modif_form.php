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
		<tr><b>Département:</b></tr><br>
		<tr><input type="radio" name="departement" value="GEI">GEI</tr><br>
		<tr><input type="radio" name="departement" value="GI">GI</tr><br>
		<tr><b>Catégorie:</b></tr><br>
		<tr><input type="text"class="t" name="Catégorie"></tr><br>
		<tr><b>Désignation:</b></tr><br>
		<tr><input type="text"class="t" name="designation"></tr><br>
		<tr><b>Fournisseur</b></tr><br>
		<tr><input type="text" class="t" name="Fournisseur"></tr><br><br>
		<tr><b>Prix HT:</b></tr><br>
		<tr><input type="text" class="t" name="Prix"></tr><br><br>
		<tr><b>Date d'acquisition:</b></tr><br>
		<tr><input type="Date" class="dt" name="Date"></tr>
	</table>
		</fieldset>
		<p><input type="submit" value="Modifier" class="boutton"name="modifier"><input type="reset" class="boutton"value="Annuler"></p>
	</form>
<?php

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

if($_SERVER["REQUEST_METHOD"] == "POST")
	{

if (isset($_POST['modifier']) )
{
	$nombre_ordre=$_POST['numero'];
	$departement=$_POST['departement'];
	$categorie=$_POST['Catégorie'];
	$designation=$_POST['designation'];
	$fournisseur=$_POST['Fournisseur'];
	$prix=$_POST['Prix'];
	$date=$_POST['Date'];

	$sql="SELECT * FROM liste where `N_d_ordre`='$nombre_ordre'";
	$res=mysqli_query($base,$sql);
	if (mysqli_num_rows($res)<=0){
		echo '<script type="text/javascript"> alert("materiel inexistant")</script> ';
	}
	else{
		$sql="UPDATE liste SET `D_partement`='$departement',`Cat_gories`='$categorie',`D_signation`='$designation',`Fournisseur`='$fournisseur',`Prix_HT_DH`='$prix',`Date_d_acquisition`='$date' WHERE `N_d_ordre`='$nombre_ordre';";

		$run=mysqli_query ($base,$sql);
		mysqli_close($base);

		if($run)
		{
			echo '<script type="text/javascript"> alert("modified")</script> ';
		}
		else
		{	
			echo '<script type="text/javascript"> alert("not modified")</script> ';
		}
	}
	 
}

}

?>
	
	
	

</body>
</html>