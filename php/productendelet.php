<?php
session_start();
require_once "../private/connictie.php";


$id = $_POST['id'];
$sql = "DELETE FROM producten WHERE id=:id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
 header("location: ../index.php?page=productenbeheren");
}
