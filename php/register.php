<?php
session_start();

require_once "../private/connictie.php";
    $statement = $conn->prepare('INSERT INTO `users` (`username`, `voornaam`, `tussenvoegsel`, `achternaam`, `woonplaats`, `straat`, `huisnummer`, `postcode`, `email`, `password`, `geboortedatum`,`rol`)
     VALUES (:username, :voornaam, :tussenvoegsel, :achternaam, :woonplaats, :straat, :huisnummer, :postcode, :email, :wachtwoord, :geboortedatum ,:rol)');

    $username = ($_POST['username']);
    $voornaam = ($_POST['voornaam']);
    $tussenvoegsel = ($_POST['tussenvoegsel']);
    $achternaam = ($_POST['achternaam']);
    $woonplaats = ($_POST['woonplaats']);
    $straat = ($_POST['straat']);
    $huisnummer = ($_POST['huisnummer']);
    $postcode = ($_POST['postcode']);
    $email = ($_POST['email']);
    $wachtwoord = ($_POST['password']);
    $geboortedatum = ($_POST['geboortedatum']);
    $rol =($_POST['rol']);  

    $statement->bindParam(':username', $username);
    $statement->bindParam(':voornaam', $voornaam);
    $statement->bindParam(':tussenvoegsel', $tussenvoegsel);
    $statement->bindParam(':achternaam', $achternaam);
    $statement->bindParam(':woonplaats', $woonplaats);
    $statement->bindParam(':straat', $straat);
    $statement->bindParam(':huisnummer', $huisnummer);
    $statement->bindParam(':postcode', $postcode);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':wachtwoord', $wachtwoord);
    $statement->bindParam(':geboortedatum', $geboortedatum);
    $statement->bindParam(':rol', $rol);

    $statement->execute();
   

    header("location: ../index.php?page=inlog");
