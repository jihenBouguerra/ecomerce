<?php



include_once('../controle/Compte.php');
include_once('../modele/BDArticle.php');

$monCompte= new compte ($_POST['Pseudo'],$_POST['Mdp1']);
 if ($monCompte->existe()){
	 
		if ($monCompte->isAdmin())
			include 'gestionAnnonce.php';
		else 
		  include 'mhc.php';
 } 	
else
include 'mhnc.php';
 

?> 