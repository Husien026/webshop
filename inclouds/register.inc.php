<h2>Accountaanmaken</h2>
<link rel="stylesheet" href="../css/html.css">
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Inloggen</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

  <form class="content" action="php/register.php" method="POST">
    <div class="container">
      <h1>Account aanmaken</h1>
      <p>Vul je gegevens in</p>
      <hr>
     <label for="username"><b>username</b></label>
     <input type="text" placeholder="Vul je username" name="username" required>

      <label for="voornaam"><b>voornaam</b></label>
      <input type="text" placeholder="Vul je voornaam" name="voornaam" required>

      <label for="tussenvoegsel"><b>tussenvoegsel</b></label>
      <input type="text" placeholder="Vul je tussenvoegsel" name="tussenvoegsel" >

      <label for="achternaam"><b>achternaam</b></label>
      <input type="text" placeholder="Vul je achternaam" name="achternaam" required>
      
      <label for="straat"><b>straat</b></label>
      <input type="text" placeholder="Vul je straat" name="straat" required>

      <label for="huisnummer"><b>huisnummer</b></label>
      <input type="number" placeholder="Vul je huisnummer" name="huisnummer" required>
      
      <label for="postcode"><b>postcode</b></label>
      <input type="number/text" placeholder="Vul je postcode" name="postcode" required>
      
      <label for="woonplaats"><b>woonplaats</b></label>
      <input type="text" placeholder="Vul je woonplaats" name="woonplaats" required>

*      <div id="email">
      <label for="email"><b>email</b></label>
      <input type="email" placeholder="Vul je email" name="email" required>
      </div>
      <label for="password"><b>wachtwoord</b></label>
      <input type="password" placeholder="Vul je wachtwoord" name="password" required>
      
      <label for="geboortedatum"><b>geboortedatum</b></label>
      <input type="date" placeholder="Vul je Geboortedatum" name="geboortedatum" required>


      <label for="rol"><b>rol</b></label>
      <input type="text" placeholder="user/ admin" name="rol" required>


      <div class="clearfix">
        <button onclick='return confirm("Are you sure you want to create a new account??")' type="submit" name="register" class="signupbtn">Inloggen</button>       
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
