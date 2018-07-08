<?php
include_once('../modele/connexion_mysql.php');
include_once('../modele/BDCategorie.php');
include_once('../modele/BDGouvernorat.php');
include_once('../modele/BDCompte.php');

function listArticleAffiche2(){
	$result = listeArticleTotale();
	foreach ($result as  $link){
		echo " <form method = 'post' action = '../vue/gestionAnnonce.php' >
				<label> <strong> Titre :</strong> ".$link['titre'].
				"</label> <br/> <label> <strong>Text annonce : </strong>".$link['texteAnnonce'].
				"</label>  <br/> <label> <strong>Prix   : </strong>" .$link['prix'].
				"</label>  <br/> <label> <strong>User  : </strong>" . getNomUser($link['user']).
				"</label>  <br/> <label> <strong>Categorie: </strong> ". getNomCategorie($link['categorie']).
				"</label>  <br/> <label> <strong>Gouvernorat: </strong>". getNomGouvernorat($link['gouvernorat']).
				"</label> <br/> <br/> <br/> <hr/>";
				  
				}
 
 }
 function listeArticle ($compte){
	 global $dbh;
	
	  $result = $dbh->query('SELECT * 
	  FROM article WHERE user = "' . $compte->Pseudo . '";');
	  $listArticle = $result->fetchAll();
	  
	  return $listArticle;
 }
 
 
  function listeArticleTotale (){
	 global $dbh;
	
	  $result = $dbh->query('SELECT * 
	  FROM article ;');
	  $listArticle = $result->fetchAll();
	  return $listArticle;
	  
 }
  function vosArticle(){
	 global $dbh;
	 session_start();
	 $query ="SELECT * 
	  FROM article where user = ". $_SESSION['id']." ;";
	
	  $result = $dbh->query( $query );
	  $listArticle = $result->fetchAll();
	  return $listArticle;
	  
 }
 
 function supprimerArticle($id){
	global $dbh;
	return $dbh->query('DELETE FROM article WHERE id = '.$id.' ;');
	
	 
}


 function listArticleAffiche3(){
	$result = vosArticle ();
	foreach ($result as  $link){
		echo " <form method = 'post' action = '../vue/VosArticle.php' >
				<label> <strong> Titre :</strong> ".$link['titre'].
				"</label> <br/> <label> <strong>Text annonce : </strong>".$link['texteAnnonce'].
				"</label>  <br/> <label> <strong>Prix   : </strong>" .$link['prix'].
				"</label>  <br/> <label> <strong>User  : </strong>" . getNomUser($link['user']).
				"</label>  <br/> <label> <strong>Categorie: </strong> ". getNomCategorie($link['categorie']).
				"</label>  <br/> <label> <strong>Gouvernorat: </strong>". getNomGouvernorat($link['gouvernorat']).
				"</label> <br/> <br/> <br/>
				<input type='submit'   name = '".$link['id']."' value ='Supprimer'    />  <hr/>
				<span style='margin-left: 30em;'></span> <form/>";
				
			        $btn  = ''.$link['id'];
				
						if(isset($_REQUEST[$btn]))
					{
						supprimerArticle((int)$btn);
						echo "<script type=\"text/javascript\">
							window.location.reload()
						</script>";
												
					}
				}
 }
	 function listArticleAffiche(){
	$result = listeArticleTotale ();
	foreach ($result as  $link){
		echo " <form method = 'post' action = '../vue/gestionAnnonce.php' >
				<label> <strong> Titre :</strong> ".$link['titre'].
				"</label> <br/> <label> <strong>Text annonce : </strong>".$link['texteAnnonce'].
				"</label>  <br/> <label> <strong>Prix   : </strong>" .$link['prix'].
				"</label>  <br/> <label> <strong>User  : </strong>" . getNomUser($link['user']).
				"</label>  <br/> <label> <strong>Categorie: </strong> ". getNomCategorie($link['categorie']).
				"</label>  <br/> <label> <strong>Gouvernorat: </strong>". getNomGouvernorat($link['gouvernorat']).
				"</label> <br/> <br/> <br/>
				<input type='submit'   name = '".$link['id']."' value ='Supprimer'    />  <hr/>
				<span style='margin-left: 30em;'></span> <form/>";
				
			        $btn  = ''.$link['id'];
				
						if(isset($_REQUEST[$btn]))
					{
						supprimerArticle((int)$btn);
						echo "<script type=\"text/javascript\">
							window.location.reload()
						</script>";
												
					}
				}
 }

	 function ajouterArticle($article){
		  global $dbh;
	    $result = $dbh->query('INSERT INTO article(categorie,gouvernorat,texteAnnonce,user,prix) 
					VALUES("' . $article->categorie . '", "' . $article->gouvernorat . '",'
                    . ' "' .$article->texteAnnonce. '", "' . $article->user. '" ,'
                    . '"' . $article->prix . '");');
		if ($result) 
		return true; 
		else 
		return false;
		 
	 }
 
 