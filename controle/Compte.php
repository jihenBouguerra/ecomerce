<?php
include_once('../modele/BDCompte.php');
class Compte {

    var $Nom;
    var $Prenom;
    var $Pseudo;
    var $Phone;
    var $Mail;
    var $Mdp;
	var $admin;
	
	  function __construct1($pseudo, $mdp) {

        $this->Pseudo = $pseudo;
        $this->Mdp = $mdp;
		
    }
	
	 function __construct() {
		$this->admin=  false;
        if (isset($_POST['Pseudo']))
            $this->Pseudo = $_POST['Pseudo'];
        else
            $this->Pseudo = "";



        if (isset($_POST['Nom']))
            $this->Nom = $_POST['Nom'];
        else
            $this->Nom = "";

        if (isset($_POST['Prenom']))
            $this->Prenom = $_POST['Prenom'];
        else
            $this->Prenom = "";

        if (isset($_POST['Email']))
            $this->Email = $_POST['Email'];
        else
            $this->Email = "";

        if (isset($_POST['Phone']))
            $this->Phone = $_POST['Phone'];
        else
            $this->Phone = "";

        if (isset($_POST['Mdp1']))
            $this->Mdp = $_POST['Mdp1'];
        else
            $this->Mdp = "";
    }
	function isAdmin (){
		
		return compteAdmin ($this);
	}
	
	function ajouter (){
		return ajouterCompte($this);
		
		
	}
	function existe (){
		
		return existeCompte($this);
		
	}
	function verifPseudo ()
	{
		return existePseudo($this);
	}

}