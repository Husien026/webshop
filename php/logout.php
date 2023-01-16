<?php
session_start();
unset($_SESSION['rol']);
header('location: ../index.php?page=inlog');
