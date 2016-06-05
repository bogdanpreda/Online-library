<?php 

$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$cnp = $_POST['cnp'];
$adresa = $_POST['adresa'];
$numar_telefon = $_POST['numar_telefon'];
$email = $_POST['email'];
$informatie_carte = 1;


include "db.php";
$db = new Database();
if($db->modificare_carte($id, $ISBN ,$nume_carte, $autor, $data_publicare, $numar_pagini, $perioada_returnare, $cantitate, $categorie, $raft))
	return true;
return false;
?>	