<?php
include "assets/autoloader.php";
include "templates/navigation.php";

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
$sql = "INSERT INTO accounts(street, streetnumber, city, country, postalcode, phone) VALUES ($street, $street, $city, $country, $postalcode, $phone)";
mysqli_query($connection, $sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <form action="index.php">
            <input type="text" placeholder="email" name="email" required><br>
            <input type="password" placeholder="wachtwoord" name="wachtwoord" required><br>
            <button type="submit" class="registerbutton">Login</button>
        </form>
    </div>
</body>
</html>
