<?php
session_start();

require_once "../private/connictie.php";

//hier cheken of de product al staat
$name = ($_POST['soorten']);
$sql = "SELECT * FROM producten WHERE soorten = :soorten  ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':soorten',  $name);
$stmt->execute();
// als het 0 is dan voetg een nieuwe toe 
if($stmt->rowCount() == 0){

if (isset($_POST['toevoegen'])) {
    $statement = $conn->prepare('INSERT INTO producten(soorten, omschrijven, prijs,voorraden, FK_categorie)
    VALUES(:soorten, :omschrijven , :prijs, :voorraden, :FK_categorie)');
    $soorten = ($_POST['soorten']);
    $omschrijven = ($_POST['omschrijven']);
    $prijs = ($_POST['prijs']);
    $voorraden = ($_POST['voorraden']);
    $FK_categorie = ($_POST['FK_categorie']);

    $statement->bindParam(':omschrijven', $omschrijven);
    $statement->bindParam(':soorten', $soorten);
    $statement->bindParam(':prijs', $prijs);
    $statement->bindParam(':voorraden', $voorraden);
    $statement->bindParam(':FK_categorie', $FK_categorie);

    $statement->execute();

    if ($statement) {

        header("location: ../index.php?page=productenbeheren");
    } else if (!$statement) {
    }
}
}