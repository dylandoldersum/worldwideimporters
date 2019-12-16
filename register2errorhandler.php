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
$sql = "UPDATE accounts SET street = '.$street.', streetnumber = '.$streetnumber.', city = '.city.', country = '.$country.', postalcode = '.$postalcode.', phone = '.$phone.' WHERE email = bruggemanluuk@gmail.com";
mysqli_query($connection, $sql);

echo $sql
//header("location: login.php");
?>
