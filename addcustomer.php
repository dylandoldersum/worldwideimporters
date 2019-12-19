<?php
include "assets/autoloader.php";

if (!isset($_SESSION['loggedin'])) {
  createCustomerifnoAccount();
  addOrder();
  header('location: bedankt.php');
}

 ?>
