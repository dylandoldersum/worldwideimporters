<?php
include "assets/autoloader.php";
include "templates/navigation.php";


$firstname = $_POST['voornaam'];
$lastname = $_POST['achternaam'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$email = $_POST['email'];

if ($password1 != $password2) {
    header('Location: register.php');
}else{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "INSERT INTO accounts(first_name, last_name, password, email) VALUES ('.$firstname.', '.$lastname.', '.$password1.', '.$email.')";
    mysqli_query($connection, $sql);

}

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
<form action="register2errorhandler.php" method="post">
    <div class=" ">
        <h1>Bezorggegevens</h1>
        <button type="submit" class="registreerbutton">Doorgaan zonder bezorggegevens</button><br><br>
        <input type="text" placeholder="bezorgadres" name="adres"><br>
        <input type="text" placeholder="huisnummer" name="huisnummer"><br>
        <input type="text" placeholder="woonplaats" name="woonplaats"><br>
        <input type="text" placeholder="land" name="land"><br>
        <input type="text" placeholder="postcode" name="postcode"><br>
        <input type="text" placeholder="telefoon" name="telefoon"><br><br>
        <button type="submit" class="registerbutton">bevestig</button>

    </div>
</form>
</body>
</html>