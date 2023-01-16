<?php
if (isset($_GET['catklant'])) {
   $sql = 'SELECT * FROM producten WHERE voorraden > 0 AND FK_categorie = :categorie ';
   $sth = $conn->prepare($sql);
   $sth->bindParam(':categorie', $_GET['catklant']);
} else {
   $sql = 'SELECT * FROM producten WHERE voorraden > 0 ';
   $sth = $conn->prepare($sql);
}

$sth->execute();
$producten = $sth->fetchAll();

?>
<?php
if (isset($_SESSION['warning'])) {
   echo '<div class="warning">' . $_SESSION['warning'] . '</div>';
   unset($_SESSION['warning']);
}
?>
<table id="pro12">
   <tr>

      <th>soorten</th>
      <th class="omschrijven">omschrijven</th>
      <th>prijs</th>
      <th>voorraden</th>
   </tr>
   <?php foreach ($producten as $product) { ?>
      <tr>
         <td hidden name="<?= $product['id'] ?>"><?= $product['id'] ?></td>
         <td name="<?= $product['soorten'] ?>"><?= $product['soorten'] ?></td>
         <td name="<?= $product['omschrijven'] ?>"><?= $product['omschrijven'] ?></td>
         <td name="<?= $product['prijs'] ?>"><?= $product['prijs'] ?></td>
         <td name="<?= $product['voorraden'] ?>"><?= $product['voorraden'] ?></td>

         <!-- <td> <button onclick='return confirm("weet je het zeker dat je deze product wilt kopen ?")' name="id" value=" <?= $product['id'] ?>" >Kopen  </button></td> -->
         <td> <button onclick='return confirm("Weet je zeker dat je deze product wilt kopen?")'> <a class="btn btn-info" href="/webshop11/webshop-master/php/aankopen.php?productid=<?= $product['id'] ?>">In de winkel mandje</a></td>


      </tr>
      </form>



   <?php } ?>

</table>