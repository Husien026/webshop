<div id="id01" class="modal">

  <form class="content" action="./php/productentoevoegen.php" method="POST">
    <div class="container">
      <h1>producten Toevoegen</h1>
      <p>Vul de gegevens van het producten in</p>
      <hr>
      <label for="soorten"><b>soorten</b></label>
      <input type="text" placeholder="Vul soorten" name="soorten" required>

      <label for="omschrijven"><b>omschrijven</b></label>
      <input type="text" placeholder=" omschrijven" name="omschrijven" required>

      <label for="prijs"><b>prijs</b></label>
      <input type="text" placeholder="Vul prijs" name="prijs" required>

      <label for="voorraden"><b>voorraden</b></label>
      <input type="number" placeholder="Vul voorraden" name="voorraden" required>

      <label class="form-label" for="FK_categorie">FK categorie</label>
      <select name="FK_categorie" id="FK_categorie">

        <?php
        $sql = 'SELECT id,categorieen FROM categorieen';
        $sth = $conn->prepare($sql);  
        $sth->execute();
        while ($categorie = $sth->fetch()) {

          echo '<option name "FK_categorie" value="' . $categorie['id'] . '">' . $categorie['categorieen'] . '</option>';
        }
        ?>
      </select>

      <div class="clearfix">
       <button onclick='return confirm("weet je zeker dat je nieuwe product wilt toevoegen")' type="submit" name="toevoegen" class="signupbtn">Toevoegen</button>
      </div>
    </div>
  </form>

</div>