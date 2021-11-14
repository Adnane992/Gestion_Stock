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
		<p><input type="submit" value="Ajouter" class="boutton" name="ajouter"><input type="reset" class="boutton" value="Annuler"></p>
	</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
	{

if (isset($_POST['numero']) && isset($_POST['departement']) &&  isset($_POST['Catégorie']) &&
isset($_POST['designation']) && isset($_POST['Fournisseur']) && isset($_POST['Prix']) && isset($_POST['Date']))
{
	$sql = 'INSERT INTO liste VALUES("'.$_POST['numero'].'", "'.$_POST['departement'].'", "'.$_POST['Catégorie'].'" ,"'.$_POST['designation'].'" , "'.$_POST['Fournisseur'].'" , "'.$_POST['Prix'].'" , "'.$_POST['Date'].'")';
	mysqli_query ($base,$sql);
	mysqli_close($base);
	 
}
else{
	'les variables de formulaires ne sont pas déclarées';
}
}
?>
	
	
	

</body>
</html>