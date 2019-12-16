<?php
$firstname = $_POST['voornaam'];
$lastname = $_POST['achternaam'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$street = $_POST['adres'];
$streetnumber = $_POST['huisnummer'];
$city = $_POST['woonplaats'];
$country = $_POST['land'];
$postalcode = $_POST['postcode'];
$phone = $_POST['telefoon'];



if ($password1 != $password2) {
header('Location: register.php');

}else {
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "INSERT INTO accounts(first_name, last_name, password, email, street, streetnumber, city, country, postalcode, phone) VAlUES ('$firstname', '$lastname', '$password', '$email', '$street', '$streetnumber', '$city', '$country', '$postalcode', '$phone');";
    mysqli_query($connection, $sql);

    header("location: login.php");
}

?>
