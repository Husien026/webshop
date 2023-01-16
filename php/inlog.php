<?php
session_start();
require_once "../private/connictie.php";
$sth = $conn->prepare('SELECT password,rol,id FROM users WHERE username = :username');
$sth->bindParam(':username', $_POST['uname'], PDO::PARAM_STR);
$sth->execute();

if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
  if ($rsUser['rol'] == 'admin') {
    $_SESSION['rol'] = 'admin';
    $_SESSION['userid'] = $rsUser['id'];
    header('location: ../index.php?page=adminpage');
  }
  if ($rsUser['rol'] == 'user') {
    $_SESSION['rol'] = 'user';
    $_SESSION['userid'] = $rsUser['id'];
    header('location: ../index.php?page=catklant');
  } else {
    $_SESSION['userid'] = $rsUser['id'];
    header('location: ../index.php?page=catklant');
  }
} else {
  header('location: ../index.php?page=inlog');
}
