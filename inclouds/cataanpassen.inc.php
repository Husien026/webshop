<?php
$sql = 'SELECT * FROM categorieen WHERE id=:id';
$sth = $conn->prepare($sql);
$sth->bindParam(':id' , $_GET['id']);
$sth->execute();

$categorie = $sth->fetch(PDO::FETCH_ASSOC);

?>
<div id="id02" class="modal">
  <form class="content" action="./php/aanpassen.php" method="POST">
    <div class="container">
      <h1>categorie aanpassen</h1>
      <p>Vul de gewijzegde gegevens van de categorie in</p>
      <hr>
      <input type="hidden" placeholder=" id" name="id" value="<?=$categorie['id'] ?>" >

      <label for="categorie"><b>categorie</b></label>
      <input type="text" placeholder=" categorieen" name="categorieen" value="<?=$categorie['categorieen'] ?>" required>

      <label for="soorten"><b>soorten</b></label>
      <input type="text" placeholder="Vul soorten" name="soorten"  value="<?=$categorie['soorten'] ?>"required>

      <div class="clearfix">
        <button onclick='return confirm("Are you sure you want to process this category?")' type="submit" name="update" class="signupbtn">aanpassen</button>
      </div>
    </div>
  </form>

</div>