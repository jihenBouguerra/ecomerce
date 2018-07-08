<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body>

 
<?php
include 'mhnc.php';
include_once('../controle/Compte.php');

function  existePseudo($Pseudo)
{
	global $dbh;
    $query = " SELECT * FROM compte WHERE Pseudo = '" .$Pseudo . "'";
	$result = $dbh->query($query);
           
       if ($result->fetch())
	
		   return  true ;
	   else 
		   return false ; 
	   
      
}
function ajouterCompte($Pseudo,$Nom,$Prenom, $Phone,$Email, $Mdp,$admin) {
	   global $dbh;
	   /*$query = "INSERT INTO compte(Pseudo,Nom,Prenom,Phone,Mail,Mdp) 
	   values ( '".$Pseudo."','".$Nom ."','".$Prenom."','".$Phone."','".$Email."','".$Mdp."')";*/
	   $query = "INSERT INTO compte(Pseudo,Nom,Prenom,Phone,Mdp) 
	   values ( '".$Pseudo."','".$Nom ."','".$Prenom."','".$Phone."','".$Mdp."')";
	    $result = $dbh->query( $query);
		/*'INSERT INTO compte(Pseudo,Nom,Prenom,Phone,Mail,Mdp,admin) 
					VALUES("' . $Pseudo . '", "' . $Nom . '",'
                    . ' "' .$Prenom . '", "' . $Phone . '" ,'
                    . '"' . $Email . '", "' . $Mdp . '", "'.$admin.'");'*/
		if ($result) 
		return true; 
		else 
		return false;
 }
function  verifier (){
	
	/*if(empty($_POST['Pseudo'])|| empty($_POST['Email'])||empty($_POST['Nom'])|| empty($_POST['Prenom'])|| empty($_POST['Phone'])||empty($_POST['Mdp1'])|| empty($_POST['Mdp2'])){
		echo 'remplir tous les champs '; return false;
	}else if(strcmp($_POST['Mdp1'],$_POST['Mdp2'] )!=0) {
		echo "verifier votre mot de passe "; 
		return false;
	}
	else if (!isset($_POST['Agree'])){
		echo "validez votre  acception ";  return false ;
	}	
	else {
		*/
		if (existePseudo($_POST['Pseudo']))
			echo "<script type=\"text/javascript\">
							alert (\"ce pseudo est deja utilise\")
						</script>";
		else{
			ajouterCompte($_POST['Pseudo'],
			$_POST['Nom'],$_POST['Prenom'],
			$_POST['Phone'],$_POST['Email'],
			$_POST['Mdp1'],false);
			echo "<script type=\"text/javascript\">
							
							window.location = 'mhc.php';
						</script>";
		
		}
		
	
	
			
	//}

}
?> 





<div class="form-style-10">
<h1>Sign Up Now!<span>Sign up and tell us what you think of the site!</span></h1>

<form method="POST" action="signUp.php" >
     <div class="section"><span>1</span>Pseudo &amp; Name</div>
     <div class="inner-wrap">
         <label>Pseudo name <input type="text" name="Pseudo" /></label>
         <label>Name <textarea name="Nom"></textarea></label>
		 <label>Prename <textarea name="Prenom"></textarea></label>
     </div>

     <div class="section"><span>2</span>Email &amp; Phone</div>
     <div class="inner-wrap">
         <label>Email Address <input type="email" name="Email" /></label>
         <label>Phone Number <input type="text" name="Phone" /></label>
     </div>

     <div class="section"><span>3</span>Passwords</div>
         <div class="inner-wrap">
         <label>Password <input type="password" name="Mdp1" /></label>
         <label>Confirm Password <input type="password" name="Mdp2" /></label>
     </div>
     <div class="button-section">
      <input type="submit" name="Valider"    />
      <span class="privacy-policy">
      <input type="checkbox" name="Agree" value = "a"/>You agree to our Terms and Policy. 
      </span>
     </div>
</form>
</div>

<?php

	if(isset($_REQUEST['Valider']))
{
	verifier ();	
}

?> 

</body>
</html>
