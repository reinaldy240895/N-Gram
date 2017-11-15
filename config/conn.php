<?php 
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "db_nlp_ngram";

	$db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die("404 Database not found!");
?>