<?php

$host = 'localhost';
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);

$productID = $_GET['itemID'];
$voornaam = $_POST['naam'];
$beoordeling = $_POST['beoordeling'];
$bericht = $_POST['bericht'];


$sql_insert = "INSERT INTO productreview (productID, name, rating, message) VALUES ($productID, '$voornaam', '$beoordeling', '$bericht')";
$result = mysqli_query($connection, $sql_insert);

header("Location: product-detail.php?itemID=$productID");

?>
