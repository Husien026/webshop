<h2>categorieen Toevoegen</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">categorieen toevoegen</button>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="content" action="./php/toevoegen.php" method="POST">
    <div class="container">
      <h1>categorieen Toevoegen</h1>
      <p>Vul de gegevens van het categorieen in</p>
      <hr>
     <label for="categorieen"><b>categorieen</b></label>
     <input type="text" placeholder="categorieen" name="categorieen" required>

      <label for="soorten"><b>soorten</b></label>
      <input type="text" placeholder="Vul soorten" name="soorten" required>


      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="toevoegen" class="signupbtn">Toevoegen</button>
      </div>
    </div>
  </form>
</div>





