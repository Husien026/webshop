<?php
$sql = 'SELECT * FROM producten WHERE id=:id';
$sth = $conn->prepare($sql);
$sth->bindParam(':id', $_GET['id']);
$sth->execute();

$product = $sth->fetch(PDO::FETCH_ASSOC);

?>
<div id="id02" class="modal">
    <form class="content" action="./php/productenaanpassen.php" method="POST">
        <div class="container">
            <h1> aanpassen</h1>
            <p>Vul de gewijzegde gegevens </p>
            <hr>
            <input type="hidden" placeholder=" id" name="id" value="<?= $product['id'] ?>">

            <label for="soorten"><b>soorten</b></label>
            <input type="text" placeholder="Vul soorten" name="soorten" value="<?= $product['soorten'] ?>" required>

            <label for="omschrijven"><b>omschrijven</b></label>
            <input type="text" placeholder=" omschrijven" name="omschrijven" value="<?= $product['omschrijven'] ?>" required>

            <label for="prijs"><b>prijs</b></label>
            <input type="text" placeholder=" prijs" name="prijs" value="<?= $product['prijs'] ?>" required>

            <label for="voorraden"><b>voorraden</b></label>
            <input type="text" placeholder=" voorraden" name="voorraden" value="<?= $product['voorraden'] ?>" required>

            <div class="clearfix">
                <button onclick='return confirm("weet je zeker dat je deze product wilt aanpassen?")' type="submit" name="update" class="signupbtn">aanpassen</button>
            </div>
        </div>
    </form>

</div>