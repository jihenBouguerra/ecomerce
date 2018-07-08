<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body>

<?php 
include 'mha.php';
include_once('../modele/BDCategorie.php');
function ajouterCategorie  ($nom)
{
	global $dbh;
    $query = "insert into categorie (nom) values ('".$nom."'); ";
	$dbh->query($query);
	
}

?> 
	
<div class="form-style-10">
<h1>Gestion Categorie 
	<span>liste des Categorie!</span>
</h1>
<?php

listCategorieAffiche();
?>
<br/><br/><br/><br/>
 
 <form method="POST" action="gestionCategorie.php"  >
<label>Nouvelle Categorie </label>
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
							ajouterCategorie($_POST['nom']);
							
						}
						
												
					}
?>




</body>
</html>
	
