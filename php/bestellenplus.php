<?php
session_start();
require_once "../private/connictie.php";


$dag = date('Y-m-d');
$userid = $_SESSION['userid'];
$productid = $_POST['productid'];
$id = $_POST['bestelw'];

$sql = "SELECT voorraden FROM producten WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->fetchColumn() < 1) {
    $_SESSION['warning'] = 'Dit product heeft geen voorraad meer';
    header("location: ../index.php?page=aankoop");
    exit;
}

$sql = "SELECT productid, userid FROM aankopen WHERE userid = :userid AND productid = :productid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid',  $userid);
$stmt->bindParam(':productid', $productid);
$stmt->execute();

if ($stmt->rowCount() == 0) {

    $insert = "INSERT INTO aankopen (productid, datum,userid)
              VALUES (:productid,:datum,:userid)";
    $stmt2 = $conn->prepare($insert);
    $stmt2->bindParam(':productid', $productid);
    $stmt2->bindParam(':datum', $dag);
    $stmt2->bindParam(':userid',  $userid);
    $stmt2->execute();
} else {
    echo 'ik kom in de else';
    $sql = "UPDATE producten SET voorraden=voorraden - 1 WHERE id = :productid;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productid', $productid);
    $stmt->execute();

    $sql = "UPDATE aankopen SET aantaal=aantaal + 1 WHERE productid = :productid AND userid = :userid;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productid', $productid);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
}
header("location: ../index.php?page=aankoop");
