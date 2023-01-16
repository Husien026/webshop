<?php
session_start();
require_once "../private/connictie.php";




$dag = date('y-m-d');

$sql = 'SELECT userid,datum,productid,aantaal FROM aankopen WHERE userid = :userid  ';
$sth2 = $conn->prepare($sql);
$sth2->bindParam(':userid', $_SESSION['userid']);
$sth2->execute();

if($sth2->rowCount() == 0){
$_SESSION['error'] = "geen producten gevonden.";
header('location: ../index.php?page=aankoop');
}

else{

$insert = "INSERT INTO geschiedenis( userid, datum)
             VALUES (:userid,:datum)";
$stmt = $conn->prepare($insert);
$stmt->bindParam(':userid',  $_SESSION['userid']);
$stmt->bindParam(':datum', $dag);
$stmt->execute();


$sql = 'SELECT gid FROM geschiedenis WHERE userid = :userid AND datum = :datum';
$sth = $conn->prepare($sql);
$sth->bindParam(':userid', $_SESSION['userid']);
$sth->bindParam(':datum', $dag);
$sth->execute();
$gid = $sth->fetchall();
foreach ($gid as $gids) {
    $gid1 = $gids['gid'];
}

$rows = $sth2->fetchAll();

?>

  <?php foreach ($rows as $row) {
        $insert = "INSERT INTO progeschiedenis(pgid, productid, voorraadp)
             VALUES (:pgid,:productid,:voorraadp)";
        $stmt3 = $conn->prepare($insert);
        $stmt3->bindParam(':pgid', $gid1);
        $stmt3->bindParam(':productid', $row['productid']);
        $stmt3->bindParam(':voorraadp', $row['aantaal']);
        $stmt3->execute();
    }

    $delete = "DELETE FROM aankopen WHERE userid = :userid";
    $stmt = $conn->prepare($delete);

    $stmt->bindParam(':userid',  $_SESSION['userid']);
    $stmt->execute();



    header('location: ../index.php?page=geschiedenis');
}
    ?>