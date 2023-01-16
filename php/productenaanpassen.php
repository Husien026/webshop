<?php
session_start();
require_once "../private/connictie.php";

if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $soorten = $_POST['soorten'];
  $omschrijven = $_POST['omschrijven'];
  $prijs = $_POST['prijs'];
  $voorraden = $_POST['voorraden'];

  $sql = "UPDATE producten SET soorten=:soorten,omschrijven=:omschrijven , prijs=:prijs,voorraden=:voorraden WHERE id =:id";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':soorten', $soorten);
  $stmt->bindParam(':omschrijven', $omschrijven);
  $stmt->bindParam(':prijs', $prijs);
  $stmt->bindParam(':voorraden', $voorraden);
  if ($stmt->execute()) {

    header("location: ../index.php?page=productenbeheren");
  }
}
