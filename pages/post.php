<?php 

$id = $_POST['ID'];
$ISBN = $_POST['ISBN'];
$nume_carte = $_POST['nume_carte'];
$autor = $_POST['autor_carte'];
$data_publicare = $_POST['data_publicare'];
$numar_pagini = $_POST['numar_pagini'];
$perioada_returnare = $_POST['perioada_returnare'];
$cantitate = $_POST['cantitate'];
$categorie = $_POST['categorie'];
$raft = $_POST['raft'];


include "db.php";
$db = new Database();
if($db->modificare_carte($id, $ISBN ,$nume_carte, $autor, $data_publicare, $numar_pagini, $perioada_returnare, $cantitate, $categorie, $raft))
	return true;
return false;
?>	