  <div class="topnav">
 <?php
$sql = 'SELECT rol FROM users';
$sth = $conn->prepare($sql);
$sth->execute();
$categorieen = $sth->fetchAll();

 if(!isset($_SESSION['rol'])){
  $_SESSION['rol'] = "gast";
  ?>
  <a href="index.php?page=inlog">Inloggen</a>
  <a href="index.php?page=register">Accountaanmaken</a>

<?php } ?> 

<?php if($_SESSION['rol'] == "admin"){ ?>
  <a href="index.php?page=categorieen">Categorieen beheer</a>
  <a href="index.php?page=productenbeheren"> Producten beheren</a>
  <a href="php/logout.php">Log out</a>

     
<?php }if($_SESSION['rol'] == "user"){ ?>
  <a href="index.php?page=catklant">Categorieen</a>
  <a href="index.php?page=producten"> Producten</a>
  <a href="index.php?page=aankoop"> Winkelmandje</a>
  <a href="index.php?page=geschiedenis"> Geschiedenis Bekijken</a>

  <a href="php/logout.php">Log out</a>
<?php } ?>


</div>
   