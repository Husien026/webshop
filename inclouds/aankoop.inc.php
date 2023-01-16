<?php
if(isset($_SESSION['error'])){
      echo '<div class="error">' . $_SESSION['error'] . '</div>';
      unset($_SESSION['error']);
}
$sql = 'SELECT aankopen.id,producten.id AS pid, soorten, omschrijven, prijs, datum,aantaal FROM  aankopen 
INNER JOIN producten on productid=producten.id WHERE userid=:id ';
$sth = $conn->prepare($sql);

$dag = date('Y-m-d');
$sth->bindParam(':id', $_SESSION['userid']);
$sth->execute();
$aankopen = $sth->fetchAll();
$totaalprijs = 0;

?>
<?php
if (isset($_SESSION['warning'])) {
      echo '<div class="warning">' . $_SESSION['warning'] . '</div>';
      unset($_SESSION['warning']);
}
?>

<table>

      <th>Id</th>
      <th>Soorten</th>
      <th>Omschrijven</th>
      <th>Prijs</th>
      <th>Datum</th>
      <th>Aantal</th>


      <?php foreach ($aankopen as $aankoop) { ?>

            <form class="content" action="php/windelet.php" method="POST">
                  <tr>
                        <input type="hidden" name="pid" value="<?= $aankoop['pid'] ?>">
                        <td> <?= $aankoop['id'] ?></td>
                        <td><?= $aankoop['soorten'] ?></td>
                        <td><?= $aankoop['omschrijven'] ?></td>
                        <td><?= $aankoop['prijs'] ?></td>
                        <td><?= $aankoop['datum'] ?></td>
                        <td><?= $aankoop['aantaal'] ?></td>
                        <td> <button onclick='return confirm("weet je zeker dat je 1 product wilt verwijderen?")' name="id" value="<?= $aankoop['id'] ?>">_ </button> </td>
            </form>
            <form class="content" action="php/bestellenplus.php" method="POST">
                  <input type="hidden" name="productid" value="<?= $aankoop['pid'] ?>">
                  <td><button type="submit" name="bestelw" value="<?= $aankoop['pid'] ?>" class="signupbtn ">+ </button></rd>
            </form>
            <td>
                  <?php $totaalprijs = $totaalprijs + $aankoop['prijs'] * $aankoop['aantaal'] ?>

            <?php }

      echo 'Totale prijs € ' . $totaalprijs ?>
            </td>
</table>

<form class="content" action="php/geschiedenis.php" method="POST">
      <input type="hidden" name="productid" value="<?= $row['pid'] ?>">
      <td><button onclick='return confirm("Weet je zeker dat je deze producten wilt bestellen?")' type="submit" name="bestelw" class="signupbtn">Bestellen </button></rd>
</form>