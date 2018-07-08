<?php
include_once('../modele/connexion_mysql.php');
 
 function listeGouvernorat(){
	 global $dbh;
	
	  $result = $dbh->query('SELECT nom  FROM gouvernorat;');
	  return  $result->fetchAll();
 }
 function listeGouvernoratTotal(){
	 global $dbh;
	
	  $result = $dbh->query('SELECT *  FROM gouvernorat;');
	  return  $result->fetchAll();
 }
  function getNomGouvernorat($index){
	  global $dbh;
	
	  return $dbh->query('SELECT nom 
	  FROM gouvernorat WHERE id = "' .$index . '";')->fetchColumn(0);
  }
  function getIdGouvernorat($index){
	  global $dbh;
	
	  return $dbh->query('SELECT id
	  FROM gouvernorat WHERE nom = "' .$index . '";')->fetchColumn(0);
  }
  function supprimerGouvernorat($id){
	global $dbh;
	return $dbh->query('DELETE FROM gouvernorat WHERE id = '.$id.' ;');
	
	
	 
}
  function tanthifGouvernorat($id){
	global $dbh;
	return $dbh->query('DELETE FROM article WHERE gouvernorat= '.$id.' ;');

	 
}
   function listGouvernoratAffiche(){
	$result =listeGouvernoratTotal();
	foreach ($result as$link){
		     
				echo "<form method = 'post' action = '../vue/gestionGouvernorat.php' >
				<label> <strong> Nom du gouvernorat:</strong> ".$link['nom'].
				"</label> <br/> <br/> <br/>
				<input type='submit'   name = '".$link['id']."' value ='Supprimer'    />  <hr/>
				<span style='margin-left: 30em;'></span>
				<form/>";
				
			        $btn  = ''.$link['id'];
				
						if(isset($_REQUEST[$btn]))
					{
						
						
					   supprimerGouvernorat((int)$btn);
					   tanthifGouvernorat((int)$btn);;
						echo "<script type=\"text/javascript\">
							window.location.reload()
							</script>";
												
					}
				 
				
				}
 }