<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<link rel="stylesheet" href="signUp.css" />

</head>

<body>
<?php 
include 'mhc.php';
include_once('../modele/BDArticle.php');

	?> 
<div class="form-style-10">
<h1>Gestion Annonces 
	<span>liste des annonces !</span>
</h1>
<?php
listArticleAffiche2();
?>
