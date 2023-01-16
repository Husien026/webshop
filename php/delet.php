<?php
session_start();
require_once "../private/connictie.php";

var_dump($_POST);
$id = $_POST['id'];

$sql = "DELETE FROM categorieen WHERE id=:id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("location: ../index.php?page=Categorieen");
    
} else {
    
}

