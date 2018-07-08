 <?php
include_once('../modele/connexion_mysql.php');

 function listeCategorieTotal(){
	 global $dbh;
	
	  $result = $dbh->query('SELECT * from categorie  ;');
	 
	 return $result->fetchAll();
	 
 }
  function supprimerCategorie($id){
	global $dbh;
	return $dbh->query('DELETE FROM categorie WHERE id = '.$id.' ;');
	
	 
}

function tanthifCategorie($id){
	global $dbh;
	return $dbh->query('DELETE FROM article WHERE  categorie = '.$id.' ;');

}
 function listCategorieAffiche(){
	$result =listeCategorieTotal();
	foreach ($result as $link){
				echo "<form method = 'post' action = '../vue/gestionCategorie.php' >
				<label> <strong> Nom du Categorie : </strong> ".$link['nom'].
				"</label> <br/> <br/> <br/>
				<input type='submit'   name = '".$link['id']."' value ='Supprimer'    />  
				<span style='margin-left: 30em;'></span>
				
				<hr/>  <form/> ";
				$btn  = ''.$link['id'];
				
					if(isset($_REQUEST[$btn]))
					{
						
						
					   supprimerCategorie((int)$btn);
					  tanthifCategorie((int)$btn);
						echo "<script type=\"text/javascript\">
							window.location.reload()
						</script>";
												
					}
	}
 }
  function getIdCategorie($index){
	  global $dbh;
	
	 return $dbh->query('SELECT id 
	  FROM categorie WHERE nom = "' . $index . '";')->fetchColumn(0);
	  
	 
	 
 }
 function getNomCategorie($index){
	  global $dbh;
	
	 return $dbh->query('SELECT nom 
	  FROM categorie WHERE id = "' . $index . '";')->fetchColumn(0);
	  
	 
	 
 }