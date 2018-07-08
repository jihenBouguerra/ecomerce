<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="signUp.css" />

</head>

<body>

<?php 
include 'mhc.php';
function ajouter($titre ,$categorie,$textAnnonce,$prix ,$Gouvernorat){
	 global $dbh;
	 $idCat= getIdCategorie($categorie); 
	 $idGouv = getIdGouvernorat($Gouvernorat);
	 session_start();
	 $idUser =$_SESSION['id'];
	 $query = "INSERT INTO article(titre,categorie,gouvernorat,texteAnnonce,user,prix) 
					VALUES('".$titre."',". $idCat .",".$idGouv.",'"
					. $textAnnonce."',". $idUser.",".(float)$prix.")";
					
	 $result = $dbh->query($query);
}
 ?> 

<div class="form-style-10">
<h1>  <span>Ajouter article </span></h1>

<form method="POST" action="ajouterArticle.php" >

     <div class="section">Nouvau article</div>
     <div class="inner-wrap">
	 
         <label>Titre de l'Annonce <input type="text" name="titre" /></label>
		 
		 <label>Categorie
		 <select name="categorie">
			<?php
				include_once('../modele/BDCategorie.php');
				$result =listeCategorieTotal();
			
				foreach ($result as  $link) {
				echo "<option value='".$link['nom']."'>".$link['nom']."</option>";
				}
				
			 ?>
		 </select>
		</label>
		
         <label>Text de l'Annonce  <textarea name="textAnnonce"></textarea></label>
		 
		 <label>Prix<input type="text" name="prix" /></label>
		 
		 <label>Gouvernorat
		 <select name="Gouvernorat">
			<?php
				include_once('../modele/BDGouvernorat.php');
				$result = listeGouvernorat();
				foreach ($result as $row => $link){
				echo "<option value='".$link['nom']."'>".$link['nom']."</option>";
				}
			 ?>
		 </select>
		</label>
		<input type = "submit" name = "enregistrer"/>
	
     </div>

</form>
<?php
	if(isset($_REQUEST['enregistrer']))
	{
		//$titre ,$categorie,$textAnnonce,$prix ,$Gouvernorat, $user
		ajouter($_POST['titre'] ,$_POST['categorie'],$_POST['textAnnonce'] ,10 ,$_POST['Gouvernorat']);
	}
		 ?>
</div>



</body>
</html>
