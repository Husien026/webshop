<?php
$sql = 'SELECT * FROM categorieen';
$sth = $conn->prepare($sql);
$sth->execute();
$categorieen = $sth->fetchAll();

?>

<table>
  <tr id > 
    <th>categorieen</th>
    <th class="soorten">soorten</th>
  </tr>
  
  <?php foreach ($categorieen as $categorie) { ?>
      <tr>
        <td name="<?= $categorie['categorieen'] ?>"><?= $categorie['categorieen'] ?></td>
        <td name="<?= $categorie['soorten'] ?>"><?= $categorie['soorten'] ?></td>  
        <td> <button><a href="index.php?page=producten&catklant=<?= $categorie['id'] ?> ">open</a></td>     
   </form>

    </tr>
    
  <?php } ?>
</table>








