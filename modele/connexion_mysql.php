<?php 

 
$dsn = 'mysql:dbname=test;localhost:3306';
$user = 'root';
$password = '';

	try {
		$dbh = new PDO($dsn, $user, $password);
		
		
	} catch (PDOException $e) {
		 die('Erreur : '.$e->getMessage());
	}

