<?php

try{
//Connexion à la base
	$db = new PDO('mysql:host=localhost;dbname=xago_v2', 'root', '');
	$db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
	echo 'Erreur : '.$e->getMessage();
	die();
}

?>