<?php
session_start();

require_once "../private/connictie.php";
//hiet chek je of een categorie al bestaat of niet 
$name = ($_POST['categorieen']);
$sql = "SELECT * FROM categorieen WHERE categorieen = :categorieen  ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':categorieen',  $name);
$stmt->execute();
// als het 0 is dan voetg een nieuwe toe
if($stmt->rowCount() == 0){

if (isset($_POST['toevoegen'])) {
    $statement = $conn->prepare('INSERT INTO categorieen(categorieen,soorten)
    VALUES(:categorieen,:soorten)');

    $categorieen = ($_POST['categorieen']);
    $soorten = ($_POST['soorten']);

    $statement->bindParam(':categorieen', $categorieen);
    $statement->bindParam(':soorten', $soorten);

    $statement->execute();

    if ($statement) {

        header("location: ../index.php?page=Categorieen");
    } else if (!$statement) {
    }
}
}