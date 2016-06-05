<?php 
include "db.php";
$db = new Database();
$id = $_GET['id'];

$data = $db->get_cititor($id);
echo json_encode($data);
?>