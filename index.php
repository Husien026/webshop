<?php
session_start();
require 'private/connictie.php';
if (isset($_GET['page'])) {

    $page = $_GET['page'];
  } else {
    $page = 'inlog';
  } ?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/html.css">
  <title>Inloggen</title>
</head>

<body>
<?php 
   include 'inclouds/navbar.inc.php'; 
   include 'inclouds/' . $page . '.inc.php';
?>


</body>

</html>