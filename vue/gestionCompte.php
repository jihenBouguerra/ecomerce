<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body>

<?php 
include 'mha.php';
include_once('../modele/BDCompte.php');

	?> 
	
<div class="form-style-10">
<h1>Gestion Compte 
	<span>liste des Comptes !</span>
</h1>
<?php
listCompteAffiche ();
?>






</body>
</html>
	
