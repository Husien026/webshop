<div id="id01" class="modal">
  
  <form class="content" action="./php/toevoegen.php" method="POST">
    <div class="container">
      <h1>categorieen Toevoegen</h1>
      <p>Vul de gegevens van het categorieen in</p>
      <hr>
      <label for="categorieen"><b>categorieen</b></label>
      <input type="text" placeholder=" categorieen" name="categorieen" required>

      <label for="soorten"><b>soorten</b></label>
      <input type="text" placeholder="Vul soorten" name="soorten" required>
      <div class="clearfix">
        <button  onclick='return confirm("Are you sure you want to add a new category?")' type="submit" name="toevoegen" class="signupbtn">Toevoegen</button>
      </div>
    </div>
  </form>
</div>