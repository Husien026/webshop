<?php
session_start();
require_once "../private/connictie.php";

$wid = $_POST['id'];
$pid = $_POST['pid'];

if (isset($_POST['id'])); {

  $sql = "SELECT aantaal FROM aankopen WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $wid);
  $stmt->execute();

  if ($stmt->fetchColumn() < 2) {


    $delete = "DELETE FROM aankopen WHERE id = :productid and userid = :userid";
    $stmt = $conn->prepare($delete);
    $stmt->bindParam(':productid', $wid);
    $stmt->bindParam(':userid',  $_SESSION['userid']);
    $stmt->execute();
  } elseif ($stmt->fetchColumn() <= 1) {

    $sql = "UPDATE producten SET voorraden = voorraden +1 WHERE id = :pid;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();


    $sql = "UPDATE aankopen SET aantaal = aantaal -1 WHERE id = :productid AND userid = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productid', $wid);
    $stmt->bindParam(':userid',  $_SESSION['userid']);
    $stmt->execute();
  } else {
    echo 'Fout melding';
  }

  header("location: ../index.php?page=aankoop");
}
