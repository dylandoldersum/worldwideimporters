<?php
include "assets/autoloader.php";

if (!isset($_SESSION['loggedin'])) {
  createCustomerifnoAccount();
}

addOrder();
addOrderLine();
header('location: bedankt.php');

 ?>
