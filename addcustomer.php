<?php
include "assets/autoloader.php";

if (!isset($_SESSION['loggedin'])) {
  createCustomerifnoAccount();
  header('location: bedankt.php');
}

 ?>
