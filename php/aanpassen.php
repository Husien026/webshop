<?php
session_start();
require_once "../private/connictie.php";

if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $categorieen = $_POST['categorieen'];
  $soorten = $_POST['soorten'];

  $sql = "UPDATE categorieen SET  categorieen=:categorieen,soorten=:soorten WHERE id =:id";
  header("location: ../index.php?page=categorieen");
  $stmt = $conn->prepare($sql);

  if ($stmt->execute(array(
    ":id" => $id,
    ":categorieen" => $categorieen,
    ':soorten' => $soorten,

  ))) {


    exit;
  } else {

    exit();
  }
}
