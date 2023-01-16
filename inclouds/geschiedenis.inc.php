<?php

$sql =  'SELECT * from geschiedenis inner join progeschiedenis on geschiedenis.gid = progeschiedenis.pgid 
inner join producten on progeschiedenis.productid = producten.id where geschiedenis.userid = :id';

$sth = $conn->prepare($sql);
$sth->bindParam(':id', $_SESSION['userid']);
$sth->execute();
$rows = $sth->fetchAll();
$totaalprijs = 0;

?>

<table class="table">
    <tr>
        <th>id</th>
        <th>Bestelnummer</th>
        <th>product id</th>
        <th>soorten</th>
        <th>omschrijven</th>
        <th>prijs</th>
        <th>Aantal</th>
        <th>Datum</th>
    </tr>
    <?php foreach ($rows as $row) { ?>
        <tr>

            <td><?= $row['id'] ?> </td>
            <td type="hedden"><?= $row['pgid'] ?> </td>
            <td><?= $row['productid'] ?> </td>
            <td><?= $row['soorten'] ?> </td>
            <td><?= $row['omschrijven'] ?> </td>
            <td><?= $row['prijs'] ?> </td>
            <td><?= $row['voorraadp'] ?> </td>
            <td><?= $row['datum'] ?> </td>

            <td> <?php $totaalprijs = $totaalprijs + $row['prijs'] * $row['voorraadp']; ?>
            <?php }
        echo '<p style =" color: green;">' . 'U heeft' . '(€' . $totaalprijs . ')' . 'in totaal betaald ' . '</p>' ?>
            </td>
        </tr>

</table>