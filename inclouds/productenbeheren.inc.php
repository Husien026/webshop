<?php
$sql = 'SELECT * FROM producten';
$sth = $conn->prepare($sql);
$sth->execute();
$producten = $sth->fetchAll();

?>

<table id="beheren">
  <th>id</th>
  <th>soorten</th>
  <th> omschrijven </th>
  <th> prijs</th>
  <th>voorraden</th>
  <th>FK_categorie</th>
  <th>
    <button onclick="window.location.href='index.php?page=protoe'">toevoegen</button>
  </th>
  </tr>

  <?php foreach ($producten as $product) { ?>
    <form class="content" action="php/productendelet.php" method="POST">
      <tr>

        <td name="<?= $product['id'] ?>"><?= $product['id'] ?></td>
        <td name="<?= $product['soorten'] ?>"><?= $product['soorten'] ?></td>
        <td name="<?= $product['omschrijven'] ?>"><?= $product['omschrijven'] ?></td>
        <td name="<?= $product['prijs'] ?>"><?= $product['prijs'] ?></td>
        <td name="<?= $product['voorraden'] ?>"><?= $product['voorraden'] ?></td>
        <td name="<?= $product['FK_categorie'] ?>"><?= $product['FK_categorie'] ?></td>

        <td> <button onclick='return confirm("weet je zeker dat je deze product wilt verwijderen?")' name="id" value="<?= $product['id'] ?>">Deleten</td>


    </form>

    <td> <button onclick="window.location.href='index.php?page=proaanpassen&id=<?= $product['id'] ?>'">Bewerken</button></td>
    </tr>

  <?php } ?>
</table>
</div>