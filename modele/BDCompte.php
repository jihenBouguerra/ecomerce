<?php
include_once('../modele/connexion_mysql.php');
/*function  existePseudo($Pseudo)
 {
	global $dbh;
	$result = $dbh->query('SELECT * FROM compte WHERE Pseudo = \'' .$Pseudo . '\'');
           
       if ($result->fetch())
	
		   return  true ;
	   else 
		   return false ;      
}*/


function getNomUser($id){
	global $dbh;
	
	 return $dbh->query('SELECT Pseudo 
	  FROM compte WHERE id = "' . $id . '";')->fetchColumn(0);
} 
 function supprimerCompte($id){
	global $dbh;
	return $dbh->query('DELETE FROM compte WHERE id = '.$id.' ;');
	
	 
}

function tanthifCompte($id){
	global $dbh;
	return $dbh->query('DELETE FROM article WHERE  user = '.$id.' ;');

}

function compteAdmin ($compte){
	global $dbh;
	
	 return $dbh->query('SELECT admin 
	  FROM compte WHERE Pseudo = "' . $compte->Pseudo .
	  '"and Mdp= "' . $compte->Mdp . '";')->fetchColumn(0);
	 
	
}

function  existeCompte($compte)
{
	global $dbh;
	
	  $result = $dbh->query('SELECT * 
	  FROM compte WHERE Pseudo = "' . $compte->Pseudo .
	  '"and Mdp= "' . $compte->Mdp . '";');
	  $rest = $result->fetch();
	  session_start();
	  $_SESSION['id']=$rest['id'];
	  
                   
		if ($rest )
		return  true;
	    else 
		return false ; 
	   
      
}

function listeCompteTotale (){
	 global $dbh;
	
	  $result = $dbh->query('SELECT * 
	  FROM compte ;');
	  $listCompte = $result->fetchAll();
	  return $listCompte;
 }
 function listCompteAffiche (){
	$result = listeCompteTotale ();
	foreach ($result as $row => $link){
		     $myId = $link['id'];
				echo " <form method = 'post' action = '../vue/gestionCompte.php' >
				<label> <strong> Nom:</strong> ".$link['Nom'].
				"</label> <br/> <label> <strong>Prenom : </strong>".$link['Prenom'].
				"</label> <br/> <label> <strong>Pseudo: </strong>".$link['Pseudo'].
				"</label>  <br/> <label> <strong>Phone   : </strong>" .$link['phone'].
				"</label>  <br/> <label> <strong>Mail  : </strong>" . $link['Mail'].
				"</label> <br/> <br/> <br/>
			   	<input type='submit'   name = '".$link['id']."' value ='Supprimer'    />  <hr/>
				<span style='margin-left: 30em;'></span> </form>";
				
				$btn  = ''.$link['id'];
				
				if(isset($_REQUEST[$btn])){
						supprimerCompte((int)$btn);
					   tanthifCompte((int)$btn);
						echo "<script type=\"text/javascript\">
							window.location.reload()
						</script>";
												
					}
				}
				 
				
}
 /*
 function ajouterCompte($compte) {
	   global $dbh;
	    $result = $dbh->query('INSERT INTO compte(Pseudo,Nom,Prenom,Phone,Mail,Mdp,admin) 
					VALUES("' . $compte->Pseudo . '", "' . $compte->Nom . '",'
                    . ' "' .$compte->Prenom . '", "' . $compte->Phone . '" ,'
                    . '"' . $compte->Email . '", "' . $compte->Mdp . '", "'.$compte->admin.'");');
		if ($result) 
		return true; 
		else 
		return false;
 }
 */
