<?php
$street = $_POST['adres'];
$streetnumber = $_POST['huisnummer'];
$city = $_POST['woonplaats'];
$country = $_POST['land'];
$postalcode = $_POST['postcode'];
$phone = $_POST['telefoon'];

$host = 'localhost';
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);
$sql = "INSERT INTO accounts(street, streetnumber, city, country, postalcode, phone) VALUES ('$street', $streetnumber, '$city', '$country', '$postalcode', '$phone')";
mysqli_query($connection, $sql);

header("location: login.php");
?>