<?php
include "assets/autoloader.php";

if (!isset($_SESSION['loggedin'])) {
    createCustomerinfoAccount();
}
addOrder();
addOrderLine();
header('location: bedankt.php');

 ?>
