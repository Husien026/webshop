<?php
session_start();
require_once "../private/connictie.php";

$dag = date('Y-m-d');
$userid = $_SESSION['userid'];
$productid = $_GET['productid'];

$sql = "SELECT voorraden FROM producten WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$sql = "SELECT productid, userid FROM aankopen WHERE userid = :userid AND productid = :productid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid',  $userid);
$stmt->bindParam(':productid', $productid);
$stmt->execute();



if ($stmt->rowCount() == 0) {
    
    $insert = "INSERT INTO aankopen (productid, datum,userid,aantaal)
              VALUES (:productid,:datum,:userid,1)";
    $stmt2 = $conn->prepare($insert);
    $stmt2->bindParam(':productid', $productid);
    $stmt2->bindParam(':datum', $dag);
    $stmt2->bindParam(':userid',  $userid);
    $stmt2->execute();
} else {
  
    

    $sql = "UPDATE aankopen SET aantaal=aantaal + 1 WHERE productid = :productid AND userid = :userid;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productid', $productid);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
}
$sql = "UPDATE producten SET voorraden=voorraden - 1 WHERE id = :productid;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productid', $productid);
    $stmt->execute();
header("location: ../index.php?page=producten");
