<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body>

<?php 
include 'mha.php';
include_once('../modele/BDGouvernorat.php');
function ajouterGouvernorat ($nom)
{
	
		$query = "insert into gouvernorat (nom) values ('".$nom."'); ";
	global $dbh;
	$dbh->query($query);
	
	
}

	?> 
	
<div class="form-style-10">
<h1>Gestion Gouvernnorat 
	<span>liste des Gouvernnorat !</span>
</h1>
<?php

listGouvernoratAffiche();
?>
<br/><br/><br/><br/>
 
 

<form method="POST" action="gestionGouvernorat.php"  >
<label>Nouvelle gouvernorat </label>
 <input type='text' name='nom' />
 <input type="submit" value ="Ajouter" name="Ajouter"   />
 
 </form>

<?php

		
		if(isset($_REQUEST['Ajouter'])){
						
						if (empty($_POST['nom'])){
							echo "<script type=\"text/javascript\">
							alert ('champ vide')
							</script>" ;
						}
						else {
							ajouterGouvernorat($_POST['nom']);
							
						}
						
												
					}
?>


</body>
</html>
	
