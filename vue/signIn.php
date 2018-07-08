<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body> 
     
<?php
include 'mhnc.php';
include_once('../controle/Compte.php');
function  ControleChamp(){
	
	if(empty($_POST['Pseudo'])|| empty($_POST['Mdp1'])){
		
			echo 'remplir tous les champs '; 
	}else {
		
		$monCompte= new compte ($_POST['Pseudo'],$_POST['Mdp1']);
		if ($monCompte->existe())
		echo "vous etes connecté";
		else 
		echo "verifié votre mdp";
			
			
	}

}
?> 



<div class="form-style-10">
<h1>Sign In Now!
	<span>Sign In and tell us what you think of the site!</span>
</h1>

<form method="POST" action="home.php" >
     <div class="section"><span>1</span>Pseudo Name &amp; Address</div>
		 <div class="inner-wrap">
			 <label>Pseudo name <input type="text" name="Pseudo" /></label>
			 <label>Password <input type="password" name="Mdp1" /></label>
			 <input type="submit" name="Valider"  value ="Conncter"  />
		 </div>
	 </div>
</form>
<?php
if(isset($_REQUEST['Valider']))
	{
		ControleChamp(); 
		
	}

?> 
</body>
</html>