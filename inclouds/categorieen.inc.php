<?php
$sql = 'SELECT * FROM categorieen';
$sth = $conn->prepare($sql);
$sth->execute();
$categorieen = $sth->fetchAll();
?>

<table>
    <th>id</th>
    <th>categorieen</th>
    <th>soorten</th>
   
      <td > <button onclick="window.location.href='index.php?page=cattoev'">toevoegen</button></td>
    
  </tr>
  <?php foreach ($categorieen as $categorie) { ?>
    <tr>
      <td name="<?= $categorie['id'] ?>"><?= $categorie['id'] ?></td>
      <td name="<?= $categorie['categorieen'] ?>"><?= $categorie['categorieen'] ?></td>
      <td name="<?= $categorie['soorten'] ?>"><?= $categorie['soorten'] ?></td>
      <td id = "verwijderknop" class="zip"> <button onclick='return confirm("Are you sure you want to delete this entry?")' name="id"  value="<?= $categorieen['id'] ?>">Verwijderen </td>
      <td>
        <form class="content" action="php/delet.php" method="POST">
        
        
        
        </form>
      </td>
      <td > <button onclick="window.location.href='index.php?page=cataanpassen&id=<?= $categorie['id'] ?>'" >Bewerken</button></td>
        </tr>
  <?php } ?>
  </table>
</div>